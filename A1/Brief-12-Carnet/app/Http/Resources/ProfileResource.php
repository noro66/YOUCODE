<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $array = parent::toArray($request);
        $array['image'] = url('storage/' .  $array['image']);
        return $array;
    }

    public static function collection($resource)
    {

        $vlaue = parent::collection($resource)->additional([
            'count' =>$resource->count()
        ]);
       return $vlaue;

    }
}
