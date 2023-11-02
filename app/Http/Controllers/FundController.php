<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Fund::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('fund_manager')) {
            $query->whereHas('manager', function ($subquery) use ($request) {
                $subquery->where('name', 'like', '%' . $request->input('fund_manager') . '%');
            });
        }

        if ($request->has('year')) {
            $query->where('start_year', $request->input('year'));
        }

        return response()->json($query->with(['manager', 'companies'])->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
            'start_year' => 'required|integer',
            'manager_id' => 'required',
            'aliases' => 'nullable|array',
        ]);

        $fund = Fund::create($data);
        return response()->json($fund, 201);
    }

    public function show(string $id): JsonResponse
    {
        $fund = Fund::with(['manager', 'companies'])->findOrFail($id);
        return response()->json($fund);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $fund = Fund::findOrFail($id);
        $data = $request->validate([
            'name' => 'filled',
            'start_year' => 'filled|integer',
            'manager_id' => 'filled|exists:fund_managers,id',
            'aliases' => 'filled|array',
            'company_ids.*' => 'filled|exists:companies,id',
        ]);

        if (isset($data['company_ids'])) {
            $fund->companies()->sync($data['company_ids']);
        }

        $fund->update($data);
        return response()->json($fund);
    }

    public function destroy(string $id): JsonResponse
    {
        $fund = Fund::findOrFail($id);
        $fund->delete();
        return response()->json(null, 204);
    }
}
