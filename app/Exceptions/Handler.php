<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

         /**
          * Mise en évidence de l'exception au cas ou le token n'est pas valide
          * ou as expiré ou prétente Une Erreur inconue ::Ajen meilleur
         */

         $this->renderable(function (TokenInvalidException $e, $request) {

            return response()->json(['error'=> 'Le token est invalide!'], Response::HTTP_BAD_REQUEST);
        });

        $this->renderable(function (TokenExpiredException $e, $request) {

            return response()->json(['error'=> 'Le token as expire !'], Response::HTTP_BAD_REQUEST);
        });

        $this->renderable(function (JWTException $e, $request) {

            return response()->json(["error'=> Le token n'existe pas! "], Response::HTTP_BAD_REQUEST);
        });

        $this->renderable(function (TokenBlacklistedException $e, $request) {

            return response()->json(["error'=> Ce token ne peut être utilisé obenez en un nouveau!"], Response::HTTP_BAD_REQUEST);
        });

    }
}
