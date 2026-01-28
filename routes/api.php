<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V4\Api\TwilioApiV4Controller;
use App\Http\Controllers\V4\Api\ReplaceApiV4Controller;
use App\Http\Controllers\V4\Api\DemoCallApiV4Controller;
use App\Http\Controllers\V4\Api\GuestAreaCityApiV4Controller;

Route::name('api.')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});
