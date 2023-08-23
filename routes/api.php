<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\HelpInstructionController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DonateController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/getdata',[SongController::class,'getdata']);

//for privacy policy and helpinstruction

Route::post('/getdata/privacypolicy',[PrivacyPolicyController::class,'getdata']);
Route::post('/getdata/helpinstruction',[HelpInstructionController::class,'getdata']);


Route::post('/getdata/donate',[DonateController::class,'getdata2']);
Route::post('/getdata/contactus',[ContactUsController::class,'getdata2']);