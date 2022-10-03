<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//movie
use App\Http\Controllers\Api\V1\MovieController as MovieV1;
use App\Http\Controllers\Api\V2\MovieController as MovieV2;

//turn
//use App\Http\Controllers\Api\V1\TurnController as TurnV1;
use App\Http\Controllers\Api\V2\TurnController as TurnV2;
//tabla con key compuesta
use App\Http\Controllers\Api\V2\MovieTurnController;


//V1 movie
Route::apiResource('v1/movies',MovieV1::class)
    ->only(['index','show', 'destroy'])
    ->middleware(['auth:sanctum']);


//V2 movie
Route::apiResource('v2/movies',MovieV2::class)
    ->only(['index','show', 'store','destroy','update'])
    ->middleware(['auth:sanctum']);


//V2 turn
Route::apiResource('v2/turns',TurnV2::class)
    ->only(['index','show','store','destroy','update'])
    ->middleware(['auth:sanctum']);

//V2 movie turn
Route::apiResource('v2/movieTurn', MovieTurnController::class)
->only(['index','show','store','destroy','update'])
->middleware(['auth:sanctum']);

Route::post('login',[
    App\Http\Controllers\Api\LoginController::class,
    'login'
]);
