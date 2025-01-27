<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $authors = Author::with(['books'])->paginate(5);
            return (new AuthorCollection($authors))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Berhasil Mendapatkan Data',
                'total' => $authors->total()
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
    public function store(Request $request)
    {
        try{
            $author = Author::create($request->all());
            return (new AuthorResource($author))->additional([
                'success' => true,
                'code' => 201,
                'message' => 'Data Berhasil Disimpan',
            ])
            ->response()
            ->setStatusCode(201);
        }catch(Exception $e){
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
            $author = Author::with(['books'])->find($id);
            if(!$author){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            return (new AuthorResource($author))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Berhasil Mendapatkan Data',
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $author = Author::find($id);
            if(!$author){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            $author->update($request->all());
            return (new AuthorResource($author))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Data Berhasil Diupdate',
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $author = Author::find($id);
            if(!$author){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            $author->delete();
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
