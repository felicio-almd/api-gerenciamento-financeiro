<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Movements;
use App\Http\Requests\StoreMovementsRequest;
use App\Http\Requests\UpdateMovementsRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MovementController extends Controller
{
    private $movements;

    public function __construct(Movement $movement){
        $this->movements = $movement;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $movements = $this->movements->where('user_id', auth()->id())->get();

        return response()->json($movements, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovementsRequest $request): JsonResponse
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $movement = $this->movements->create($data);

        return response()->json($movement, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $movement = $this->movements->where('user_id', auth()->id())->findOrFail($id);

        return response()->json($movement, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovementsRequest $request, $id)
    {
        $movement = $this->movements->where('user_id', auth()->id())->findOrFail($id);
        $data = $request->validated();

        $movement->update($data);

        return response()->json($movement, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movement = $this->movements->where('user_id', auth()->id())->findOrFail($id);

        $movement->delete();

        return response()->json($movement, Response::HTTP_OK);
    }
}
