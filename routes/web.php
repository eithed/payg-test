<?php

Route::get('/', ['uses' => RedirectController::class."@add"]);
Route::post('/', ['uses' => RedirectController::class."@store"]);

Route::get('/{token}', ['uses' => RedirectController::class."@get"]);