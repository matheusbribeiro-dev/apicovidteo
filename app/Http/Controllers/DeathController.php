<?php

namespace App\Http\Controllers;

use App\Models\Deaths;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class DeathController extends Controller
{
    private $model;

    /**
     * Create a new controller instance.
     *
     * @param Deaths $deaths
     */
    public function __construct(Deaths $deaths)
    {
        $this->model = $deaths;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $deaths = $this->model->all();

        try {
            if (count($deaths) > 0) {
                return response()->json($deaths, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
