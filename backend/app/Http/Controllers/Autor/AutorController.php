<?php

namespace App\Http\Controllers\Autor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\AutorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AutorController extends Controller
{

    /** @var \App\Repository\AutorRepository */
    protected $autoRepository;

    public function __construct(
        AutorRepository $autorRepository
    ) {
        $this->autoRepository = $autorRepository;
    }

    /**
     * Buscar todos os autores
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->autoRepository->getAll());
    }

    /**
     * Buscar um autor
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function getById(int $id): JsonResponse
    {
        return response()
            ->json($this->autoRepository->findById($id));
    }

    /**
     * Cadastrar um novo autor
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'sobrenome' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                "validator" => true,
                "message" => $validator->errors()
            ], 401);
        }
        $data = $request->all();
        if ($this->autoRepository->insert($data)) {
            return response()->json(["status" => true]);
        }
    }

    /**
     * Atualizar um autor
     *
     * @param integer $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'nome' => 'required',
                'sobrenome' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    "validator" => true,
                    "message" => $validator->errors()
                ], 401);
            }
            $data = $request->all();
            if ($this->autoRepository->edit($id, $data)) {
                return response()->json(["status" => true]);
            }
        } catch (\Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }

    /**
     * Deletar um autor
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        try {
            if ($this->autoRepository->remove($id)) {
                return response()->json(["status" => true]);
            }
        } catch (\Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }
}
