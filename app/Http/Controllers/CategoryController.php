<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Models\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = $this->category->all();

        return response()->json($categories, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriesRequest $request): JsonResponse
    {
        $data = $request->validated();

        $category = $this->category->create($data);

        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $category = $this->category->findOrFail($id);

        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $data = $request->validated();

        $category->update($data);

        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);

        $category->delete();

        return response()->json(['message'=> 'Categoria deletada com sucesso'], Response::HTTP_OK);
    }
}
