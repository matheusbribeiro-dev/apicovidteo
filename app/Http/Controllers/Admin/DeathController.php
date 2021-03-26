<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deaths;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        try {
            $newDeath = Deaths::create([
                'confirmed' => $request->confirmed,
                'date_at' => $request->date,
            ]);

            return response()->json(["message" => 'Inserido com sucesso :) !'], Response::HTTP_OK);
        } catch (QueryException $exception) {
            return response()->json(["message" => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
