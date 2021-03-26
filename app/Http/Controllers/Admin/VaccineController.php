<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beds;
use App\Models\Vaccine;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        try {
            $newVaccine = Vaccine::create([
                'dose' => $request->dose,
                'applied_dose' => $request->appliedDose,
                'date_at' => $request->date,
            ]);

            return response()->json(["message" => 'Inserido com sucesso :) !'], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json(["message" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
