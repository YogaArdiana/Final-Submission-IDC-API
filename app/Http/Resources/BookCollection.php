<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform(function ($book){
                return[
                    'id' => $book->id,
                    'title' => $book->title,
                    'description' => $book->description,
                    'author' => $book->author ? [
                        'id' => $book->author->id,
                        'name' => $book->author->name,
                        // 'description' => $book->author->biography
                    ] : null,
                    'category' => $book->category ? [
                        'id' => $book->category->id,
                        'name' => $book->category->name
                    ] : null,
                    'created_at' => $book->created_at,
                    'updated_at' => $book->updated_at
                ];
            }),
        ];
    }
}
