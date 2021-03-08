<?php

namespace App\Http\Controllers;

use App\Models\Beds;
use App\Models\Cases;
use App\Models\Deaths;
use App\Models\Hospitalizations;
use App\Models\Vaccine;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class AllController extends Controller
{
    private $modelCases;
    private $modelDeaths;
    private $modelHosp;
    private $modelBeds;
    private $modelVaccine;

    /**
     * Create a new controller instance.
     *
     * @param Cases $cases
     * @param Deaths $deaths
     * @param Hospitalizations $hosp
     * @param Beds $beds
     * @param Vaccine $vaccine
     */
    public function __construct(Cases $cases,
                                Deaths $deaths,
                                Hospitalizations $hosp,
                                Beds $beds,
                                Vaccine $vaccine)
    {
        $this->modelCases = $cases;
        $this->modelDeaths = $deaths;
        $this->modelHosp = $hosp;
        $this->modelBeds = $beds;
        $this->modelVaccine = $vaccine;
    }

    public function index()
    {
        $cases = $this->modelCases->all();
        $deaths = $this->modelDeaths->all();
        $hosp = $this->modelHosp->all();
        $beds = $this->modelBeds->all();
        $vaccine = $this->modelVaccine->all();

        try {
            return response()->json([
                'cases' => $cases,
                'deaths' => $deaths,
                'hospitalizations' => $hosp,
                'beds' => $beds,
                'vaccine' => $vaccine
            ], Response::HTTP_OK);

        } catch (QueryException $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
