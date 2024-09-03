<?php

namespace App\infra\entrypoint\controller;

use Illuminate\Http\Request;

abstract class BaseController
{
    function handle(Request $request)
    {
        return $this->perform($request);
    }

    abstract function perform(Request $request);
}
