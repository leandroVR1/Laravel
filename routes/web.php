<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlackController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para enviar información del usuario a Slack
Route::get('/send-user-info/{userId}', [SlackController::class, 'sendUserInfo']);

// Ruta para manejar eventos de Slack
Route::post('/slack/events', [SlackController::class, 'handleSlackEvents']);

