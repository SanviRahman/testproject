<?php

use App\Http\Controllers\Api\HealthController;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/health', [HealthController::class, 'index']);


Route::middleware('auth:sanctum')->post(
    '/tasks/validate',
    function (StoreTaskRequest $request) {
        return response()->json([
            'success' => true,
            'data' => $request->validated()
        ], 200);
    }
);