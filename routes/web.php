<?php

use Illuminate\Support\Facades\Route;

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
    \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5277393582:AAEJQ4gDE9KSKrGvFav5_nbGtb43xPe0Uy4/sendMessage', [
        'chat_id' => 458317485,
        'text' => '<span class="tg-spoiler">spoiler</span>, <tg-spoiler>spoiler</tg-spoiler>
<a href="tg://user?id=458317485">inline mention of a user</a>
<code>inline fixed-width code</code>',
        'parse_mode' => 'HTML',
    ]);
});

Route::get(' /test', [\App\Http\Controllers\TelegaController::class, 'ky']);
