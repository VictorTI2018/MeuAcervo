<?php

namespace App\Http\Controllers\Editora;

use App\Http\Controllers\Controller;
use App\Repository\EditoraRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

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

    public function insert(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required'
        ]);
        if ($validator->fails()) {
            return response()
                ->json([
                    "validator" => true,
                    "message" => $validator->errors()
                ], 401);
        }

        $data = $request->all();
        if ($this->editoraRepository->insert($data)) {
            return response()->json(["status" => true]);
        }
    }
}
