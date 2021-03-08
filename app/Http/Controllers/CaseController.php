<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class CaseController extends Controller
{
    private $model;

    /**
     * Create a new controller instance.
     *
     * @param Cases $cases
     */
    public function __construct(Cases $cases)
    {
        $this->model = $cases;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $cases = $this->model->all();

        try {
            if (count($cases) > 0) {
                return response()->json($cases, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //
}
