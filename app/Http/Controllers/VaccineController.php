<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class VaccineController extends Controller
{
    private $model;

    /**
     * Create a new controller instance.
     *
     * @param Vaccine $vaccine
     */
    public function __construct(Vaccine $vaccine)
    {
        $this->model = $vaccine;
    }

    public function index()
    {
        $vaccine = $this->model->all();

        try {
            if (count($vaccine) > 0) {
                return response()->json($vaccine, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
