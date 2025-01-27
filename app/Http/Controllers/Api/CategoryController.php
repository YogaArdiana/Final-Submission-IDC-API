<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $category = Category::with(["books"])->paginate(5);
            return (new CategoryCollection($category))->additional([
                'success' => true,
                'code' => 200,
                'message' => 'Berhasil Mendapatkan Data',
                'total' => $category->total()
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
            $category = Category::create($request->all());
            return (new CategoryResource($category))->additional([
                'success' => true,
                'code' => 201,
                'message' => 'Data Berhasil Disimpan',
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $category = Category::with(["books"])->find($id);
            if(!$category){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            return (new CategoryResource($category))->additional([
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
            $category = Category::find($id);
            if(!$category){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            $category->update($request->all());
            return (new CategoryResource($category))->additional([
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
            $category = Category::find($id);
            if(!$category){
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Data Tidak Ditemukan',
                ], 404);
            }
            $category->delete();
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
