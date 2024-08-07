<?php

namespace App\Http\Controllers\Annotations ;

/**
 * @OA\Security(
 *     security={
 *         "BearerAuth": {}
 *     }),

 * @OA\SecurityScheme(
 *     securityScheme="BearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"),

 * @OA\Info(
 *     title="Your API Title",
 *     description="Your API Description",
 *     version="1.0.0"),

 * @OA\Consumes({
 *     "multipart/form-data"
 * }),

 *

 * @OA\PUT(
 *     path="/api/evaluations/3",
 *     summary="modifier evaluation",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="date", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="matiere_id", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="user_id", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="valeur", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\DELETE(
 *     path="/api/evaluations/5",
 *     summary="sup Evaluation",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="204", description="Deleted successfully"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 * @OA\Response(response="404", description="Not Found"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\POST(
 *     path="/api/evaluations",
 *     summary="ajoutEvaluation",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="201", description="Created successfully"),
 * @OA\Response(response="400", description="Bad Request"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 *     @OA\Parameter(in="path", name="date", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="user_id", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="matiere_id", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="valeur", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\GET(
 *     path="/api/evaluations",
 *     summary="afficheEvaluation",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\GET(
 *     path="/api/trashed",
 *     summary="afficher etudiants sup",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\GET(
 *     path="/api/forceDelete/16",
 *     summary="forcedelete",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\GET(
 *     path="/api/restore/16",
 *     summary="Restaurer etudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\DELETE(
 *     path="/api/etudiants/16",
 *     summary="supprimer etudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="204", description="Deleted successfully"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 * @OA\Response(response="404", description="Not Found"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\PUT(
 *     path="/api/etudiants/16",
 *     summary="Modifier etudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="prenom", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="nom", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="adresse", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="matricule", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="date_naissance", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\POST(
 *     path="/api/etudiants",
 *     summary="Ajout Etudiants",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="201", description="Created successfully"),
 * @OA\Response(response="400", description="Bad Request"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 *     @OA\Parameter(in="path", name="prenom", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="nom", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="adresse", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="matricule", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="date_naissance", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


 * @OA\POST(
 *     path="/api/login",
 *     summary="login",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="201", description="Created successfully"),
 * @OA\Response(response="400", description="Bad Request"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 *     @OA\Parameter(in="path", name="email", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="password", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"My Collection"},
*),


*/

 class MyCollectionAnnotationController {}
