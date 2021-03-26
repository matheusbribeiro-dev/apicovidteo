<?php

namespace App\Http\Controllers;

use App\Models\Hospitalizations;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class HospController extends Controller
{
    private $model;

    /**
     * Create a new controller instance.
     *
     * @param Hospitalizations $hosp
     */
    public function __construct(Hospitalizations $hosp)
    {
        $this->model = $hosp;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $hosp = $this->model->orderByDesc('id')->limit(1)->get();

        try {
            if (count($hosp) > 0) {
                return response()->json($hosp[0], Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
