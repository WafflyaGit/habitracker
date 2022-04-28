<?php

namespace App\Http\Resources;

use App\Models\Folder;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Folder $folder */
        $folder = $this->resource;

        return collect($folder)->merge([
            'name' => $folder->name,
        ]);
    }
}
