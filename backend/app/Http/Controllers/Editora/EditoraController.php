<?php

namespace App\Http\Controllers\Editora;

use App\Http\Controllers\Controller;
use App\Repository\EditoraRepository;
use Illuminate\Http\JsonResponse;

class EditoraController extends Controller
{
    /** @var \App\Repository\EditoraRepository */
    protected $editoraRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        EditoraRepository $editoraRepository
    ) {
        $this->editoraRepository = $editoraRepository;
    }

    /**
     * Buscar todas as editoras
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()
            ->json($this->editoraRepository->getAll());
    }

    /**
     * Buscar uma editora
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function getById(int $id): JsonResponse
    {
        return response()->json($this->editoraRepository->findById($id));
    }
}
