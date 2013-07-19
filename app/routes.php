<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller("employees", "EmployeeController");

Route::controller("leaves", "LeaveController");

Route::controller("educations", "EducationController");

Route::controller("works", "WorkController");

Route::controller("certifications", "CertificationController");


//Route::controller("home", "HomeController");

Route::get('/', 'HomeController@get_index');
//Route::get('/', function()
//{
//	return get_index();
//});