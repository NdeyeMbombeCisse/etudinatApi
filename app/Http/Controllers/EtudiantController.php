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


//  fonction pour supprimer en douce
public function destroy(User $user)
{
    $user->delete();
    return $this->Response("etudiant supprime avec succes",null,200);   
}



// fonction pour restaurer une element supprimer en douce
public function restore($id)
{
    // Récupérer l'utilisateur supprimé en douceur en utilisant l'ID
    $user = User::onlyTrashed()->where('id', $id)->first();

    // Vérifier si l'utilisateur existe
    if (!$user) {
        return response()->json([
            'message' => 'Utilisateur non trouvé',
        ], 404);
    }

    // Restaurer l'utilisateur
    $user->restore();

    // Retourner une réponse JSON personnalisée indiquant que l'utilisateur a été restauré avec succès
    return response()->json([
        'message' => 'Utilisateur restauré avec succès',
        'data' => $user
    ]);
}


public function forceDelete($id)
{
    // Récupérer l'utilisateur supprimé en douceur en utilisant l'ID
    $user = User::onlyTrashed()->where('id', $id)->first();

    // Vérifier si l'utilisateur existe
    if (!$user) {
        return $this->Response("L'utilisateur avec l'ID $id n'a pas été trouvé dans les utilisateurs supprimés.", null, 404);
    }

    try {
        // Forcer la suppression
        $user->forceDelete();
        return $this->Response("L'utilisateur a été supprimé définitivement.", null, 200);
    } catch (\Exception $e) {
        // Gestion des exceptions
        return $this->Response("Une erreur est survenue lors de la suppression de l'utilisateur : " . $e->getMessage(), null, 500);
    }
}

// foncton pour recuperer les users qui on ete supprimer en douce
public function trashed()
{ // Récupérer tous les users supprimés en douceur
    $users = User::onlyTrashed()->get();
    // retour d'une reponse json
    return $this->Response("users archivés", $users);
}




public function update(Request $request, User $user)
{
    // Validation des données
    $validator = Validator::make($request->all(), [
        'prenom' => 'required|string|max:255',
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'matricule' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'date_naissance' => 'required|date',
    ]);

    // Vérifier si la validation échoue
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    // Mise à jour des attributs de l'utilisateur
    $data = $request->only(['prenom', 'nom', 'adresse', 'matricule', 'email', 'date_naissance']);

    // Hachage du mot de passe si fourni
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->input('password'));
    }

    // Gestion de la photo de profil
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $data['photo'] = $photo->store('photos', 'public');
    }

    // Mise à jour de l'utilisateur dans la base de données
    $user->update($data);

    // Retourner une réponse JSON
    return response()->json([
        'message' => 'Utilisateur mis à jour avec succès',
        'user' => $user
    ], 200);
}





}
