<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubjectController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/subject', SubjectController::class);

// http://192.168.1.12:8888/

// GET|HEAD        api/subject .................................................................................... subject.index › SubjectController@index
// POST            api/subject .................................................................................... subject.store › SubjectController@store
// GET|HEAD        api/subject/{subject} ............................................................................ subject.show › SubjectController@show
// PUT|PATCH       api/subject/{subject} ........................................................................ subject.update › SubjectController@update
// DELETE          api/subject/{subject} ...................................................................... subject.destroy › SubjectController@destroy
