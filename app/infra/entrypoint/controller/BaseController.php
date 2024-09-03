<?php

namespace App\infra\entrypoint\controller;

use Illuminate\Http\Request;

abstract class BaseController
{
    function handle(Request $request)
    {
        try {
            return $this->perform($request);
        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    abstract function perform(Request $request);
}
