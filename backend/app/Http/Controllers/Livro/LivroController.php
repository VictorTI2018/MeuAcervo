<?php

namespace App\Http\Controllers\Livro;

use App\Http\Controllers\Controller;
use App\Repository\LivroRepository;
use App\Repository\AutorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivroController extends Controller
{
    /** @var \App\Repository\LivroRepository */
    protected $livroRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LivroRepository $livroRepository
    ) {
        $this->livroRepository = $livroRepository;
    }

    /**
     * Buscar todos os livros
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->livroRepository->getAll());
    }

    /**
     * Cadastrar um novo livro
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'descricao' => 'required',
            'data_pub' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "validator" => true,
                "message" => $validator->errors()
            ], 401);
        }
        $data = $request->all();
        if ($this->livroRepository->insert($data)) {
            return response()->json(["status" => true], 200);
        }
    }
}
