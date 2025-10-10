<?php


use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\CompanyApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Public route to loging and get the token on postman or any other frontend
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

     /** @var \App\Models\User $user */
    $user = Auth::user();

    $token = $user->createToken('api-token')->plainTextToken; 

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
});

//Public routes, get access to resources (projects, companies etc) from postman or any other frontend WITHOUT AUTHENTCATION
  Route::apiResource('projects', ProjectApiController::class)->only(['index', 'show']);
  Route::apiResource('companies', CompanyApiController::class)->only(['index', 'show']);

//Protected routes, get access to resources (projects, companies etc) from postman or any other frontend WITH AUTHENTICATION
Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('projects', ProjectApiController::class);
});

//For logout from postman or any other frontend
Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out']);
});
