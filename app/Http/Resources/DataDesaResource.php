<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataDesaResource extends JsonResource
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
            'penjelasan' => $this->penjelasan,
            'foto' => url('storage/data_desa/' . $this->foto),
            'createdAt' => Carbon::parse($this->created_at)->format('d-M-Y'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('d-M-Y')
        ];
    }
}
