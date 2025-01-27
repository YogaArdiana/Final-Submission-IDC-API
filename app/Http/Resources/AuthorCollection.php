<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AuthorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'data' => $this->collection->transform(function ($author){
                return[
                    'id' => $author->id,
                    'name' => $author->name,
                    'biography' => $author->description,
                    'book_total' => $author->books->count(),
                    'created_at' => $author->created_at,
                    'updated_at' => $author->updated_at
                ];
            }),
        ];
    }
}
