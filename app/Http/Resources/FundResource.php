<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'manager' => new FundManagerResource($this->whenLoaded('manager')),
            'aliases' => new AliasResourceCollection($this->whenLoaded('aliases')),
            'companies' => new CompanyResourceCollection($this->whenLoaded('companies')),
        ];
    }
}