<?php

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
    return view('index');
});
Route::post('/send-mail', function (Request $request) {
    $validMail = $request->validate([
        'email' => ['required', 'email'],
        'subject' => 'required',
        'message' => 'required'
    ]);

    $isSuccess = Mail::to('markdennis@neksjob.com')
        ->send(new TestMail(
            $validMail['email'],
            $validMail['subject'],
            $validMail['message']
        ));

    $sessionMessage = [];

    if (!$isSuccess){
        $sessionMessage = ['failed' => 'There is an error while sending the email.'];
    } else {
        $sessionMessage = ['success' => 'Email sent.'];
    }

    return redirect('/')->with($sessionMessage);

});
