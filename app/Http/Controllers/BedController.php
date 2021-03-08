<?php

namespace App\Http\Controllers;

use App\Models\Beds;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class BedController extends Controller
{
    private $model;

    /**
     * Create a new controller instance.
     *
     * @param Beds $beds
     */
    public function __construct(Beds $beds)
    {
        $this->model = $beds;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $beds = $this->model->all();

        try {
            if (count($beds) > 0) {
                return response()->json($beds, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
