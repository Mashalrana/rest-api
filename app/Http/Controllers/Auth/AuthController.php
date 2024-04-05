<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Methode om gebruikers in te loggen en een token te genereren.
     * 
     * Deze methode valideert de inloggegevens die via een POST request worden ontvangen,
     * probeert de gebruiker te authenticeren, en genereert een Sanctum token
     * als de authenticatie succesvol is. Bij falen wordt een 401 Unauthorized
     * statuscode teruggestuurd met een foutmelding.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Valideer de inloggegevens.
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Probeer de gebruiker te authenticeren.
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Als authenticatie faalt, geef een foutmelding.
            return response()->json(['message' => 'De opgegeven credentials zijn incorrect.'], 401);
        }

        // Haal de geauthenticeerde gebruiker op.
        $user = Auth::user();

        // Genereer een nieuw Sanctum token voor de gebruiker.
        $token = $user->createToken('api-token')->plainTextToken;

        // Retourneer een succesvolle response met het token.
        return response()->json(['token' => $token]);
    }
}
