<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEvaluationRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette demande.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtenir les règles de validation qui s'appliquent à la demande.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'valeur' => ['required', 'integer'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'matiere_id' => ['required', 'integer', 'exists:matieres,id'],
        ];
    }

    /**
     * Gérer une validation échouée.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422));
    }
}
