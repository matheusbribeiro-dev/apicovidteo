<?php

namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Crypt;
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
        $cases = $this->model->orderByDesc('id')->limit(1)->get();

        try {
            if (count($cases) > 0) {
                return response()->json($cases[0], Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //
}
