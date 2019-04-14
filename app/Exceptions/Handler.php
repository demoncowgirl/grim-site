<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
        /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    // protected function renderHttpException(HttpException $e)
    // {
    //     if (! view()->exists("errors.{$e->getStatusCode()}")) {
    //     return response()->view('errors.default', ['exception' => $e], 500, $e->getHeaders());
    //     }
    //     return parent::renderHttpException($e);
    // }
    public function render($request, Exception $e)
      {
      if ($this->isException($e)) {
          if ($e->getStatusCode() == 404) {
              return response()->view('errors.' . '404', [], 404);
          }
          if ($e->getStatusCode() == 500) {
              return response()->view('errors.' . '500', [], 500);
          }
      return parent::render($request, $e);
      }
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {

          parent::report($exception);

    }


}
