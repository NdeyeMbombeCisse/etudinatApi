<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $evaluations = Evaluation::with(['user', 'matiere'])->get();
        $evaluation = Evaluation::all();
        return $this->Response('liste des evaluations', $evaluation);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $validatedData = $request->validated();

        // Créer une nouvelle évaluation
        $evaluation = Evaluation::create($validatedData);
        return $this->Response('evaluation faite avec succes',  $evaluation);

    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        // Récupérer l'évaluation à modifier
        // Mettre à jour l'évaluation avec les données validées
    $evaluation->update($request->validated());

    // Retourner une réponse JSON confirmant la mise à jour
    return response()->json([
        'success' => true,
        'message' => 'Évaluation modifiée avec succès',
        'data' => $evaluation
    ]);

        return $this->Response('evaluation modifiee avec succes',  $evaluation);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return $this->Response('evaluation supprimee avec succes',  $evaluation);


    }
}
