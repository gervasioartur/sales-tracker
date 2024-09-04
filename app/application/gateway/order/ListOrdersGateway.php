<?php

namespace App\application\gateway\order;

interface ListOrdersGateway
{
    function list() : ?array;
}
