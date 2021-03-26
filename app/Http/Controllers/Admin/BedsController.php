<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beds;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BedsController extends Controller
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

    public function index(Request $request)
    {
        try {
            $newBeds = Beds::create([
                'beds' => $request->beds,
                'busy_beds' => $request->busyBeds,
                'patients_teo' => $request->patientsTeo,
                'patients_not_teo' => $request->patientsNotTeo,
                'date_at' => $request->date,
            ]);

            return response()->json(["message" => 'Inserido com sucesso :) !'], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json(["message" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
