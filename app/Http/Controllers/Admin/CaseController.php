<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        try {
            $newCase = Cases::create([
                'recovered' => $request->recovered,
                'active' => $request->active,
                'confirmed' => $request->confirmed,
                'discarded' => $request->discarded,
                'date_at' => $request->date,
            ]);

            return response()->json(["message" => 'Inserido com sucesso :) !'], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json(["message" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
