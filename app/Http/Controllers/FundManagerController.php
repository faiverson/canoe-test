<?php

namespace App\Http\Controllers;

use App\Models\FundManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FundManagerController extends Controller
{
    public function index(): JsonResponse
    {
        $funds = FundManager::all();
        return response()->json($funds);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $manager = FundManager::create($data);
        return response()->json($manager, 201);
    }

    public function show(string $id): JsonResponse
    {
        $manager = FundManager::findOrFail($id);
        return response()->json($manager);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $manager = FundManager::find($id);
        $data = $request->validate([
            'name' => 'required',
        ]);

        $manager->update($data);
        return response()->json($manager);
    }

    public function destroy(string $id): JsonResponse
    {
        $manager = FundManager::findOrFail($id);
        $manager->delete();
        return response()->json(null, 204);
    }
}
