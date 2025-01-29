<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $author = request()->query('author');
            $category = request()->query('category');
            $order = request()->query('order');
            $search = request()->query('search');

            $books = Book::with(["author", "category"]);

            if($author){
                    $books = $books->where('author_id', $author);
            }
            if($category){
                    $books = $books->where('category_id', $category);
            }   
            if ($order = request()->query('order')) {
                $books = $books->orderBy('created_at', $order === 'latest' ? 'desc' : 'asc');
            }
            if($search){
                $books = $books->where('title', 'like', '%' . $search . '%');
            }
            $books = $books->paginate(5);
            return (new BookCollection($books))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Berhasil Mendapatkan Data',
                'total' => $books->total()
            ])
            ->response()
            ->setStatusCode(200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Terjadi Kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try{
            // $book = new Book();
            $book = Book::create([
                'title' => $request->title,
                'description' => $request->description,
                'author_id' => $request->author_id,
                'category_id' => $request->category_id,
            ]);
            return (new BookResource($book))->additional([
                'success' => true,
                'code' => 201,
                'message' => 'Data Berhasil Ditambahkan'
            ])
            ->response()
            ->setStatusCode(201);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Terjadi Kesalahan: ' . $e->getMessage(),
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $book = Book::find($id);
            if(!$book){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 500);
            }

            return (new BookResource($book))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Data Berhasil Ditemukan'
            ]);

        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Terjadi Kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, string $id)
    {
        try{  
            $book = Book::find($id);
            if(!$book){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            $book->update($request->all());
            return (new BookResource($book))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Data Berhasil Diperbaharui',
            ])->response()->setStatusCode(200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Terjadi Kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $book = Book::find($id);
            if(!$book){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            $book->delete();
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data Berhasil Dihapus',
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Terjadi Kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}
