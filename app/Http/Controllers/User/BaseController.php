<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\Service;

class BaseController extends Controller
{
    public $servise;
    public function __construct(Service $service)
    {
        $this->servise = $service;
    }
}
