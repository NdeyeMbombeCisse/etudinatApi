<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user =User::all();
        return $this->Response('liste des etudiants',$user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation des données
    $validator = Validator::make($request->all(), [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'matricule' => 'required|string|max:255',
         'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'date_naissance' => 'required|date',
    ]);

    // Vérifier si la validation échoue
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    // Créer une nouvelle instance du modèle User
    $user = new User();

    // Assignation des valeurs aux attributs du modèle
    $user->prenom = $request->input('prenom');
    $user->nom = $request->input('nom');
    $user->adresse = $request->input('adresse');
    $user->matricule = $request->input('matricule');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password')); // Hachage du mot de passe
    $user->date_naissance = $request->input('date_naissance');

    // Gestion de la photo de profil
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $user->photo = $photo->store('photos', 'public');
    } else {
        $user->photo = 'default.jpg'; // Valeur par défaut si aucune photo n'est uploadée
    }

    // Sauvegarder l'utilisateur dans la base de données
    $user->save();

    // Retourner une réponse JSON
    return response()->json([
        'message' => 'Utilisateur ajouté avec succès',
        'user' => $user
    ], 201);
}
}
