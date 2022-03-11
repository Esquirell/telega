<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $e)
    {
//        $message = $e->getMessage();
//        \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5277393582:AAEJQ4gDE9KSKrGvFav5_nbGtb43xPe0Uy4/sendMessage', [
//            'chat_id' => 458317485,
//            'text' => "<code>$message</code>",
//            'parse_mode' => 'HTML',
//        ]);
    }
}
