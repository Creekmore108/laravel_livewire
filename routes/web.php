<?php

use Illuminate\Support\Facades\Route;
// use App\Mail\ContactFormAMilable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/examples', function () {
    return view('examples');
});

Route::get('/contact', function(Request $request) {
    $contact = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'message' => 'required',
    ]);

    Mail::To('steve.creekmore@gmail.com')->send(new ContactFormMailable($contact));

    return back()->with('success_message', 'We recieved your message succesfully and will get back to you shortly');
});
