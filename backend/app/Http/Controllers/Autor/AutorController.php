<?php

namespace App\Http\Controllers\Autor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\AutorRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{

    /** @var \App\Repository\AutorRepository */
    protected $autoRepository;

    public function __construct(
        AutorRepository $autorRepository
    ) {
        $this->autoRepository = $autorRepository;
    }

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
}
