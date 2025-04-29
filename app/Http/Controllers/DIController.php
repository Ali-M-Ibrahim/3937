<?php

namespace App\Http\Controllers;

use App\Services\LoggingService;
use Illuminate\Http\Request;

class DIController extends Controller
{

    private  $logService;

    public function __construct(LoggingService $service)
    {
        $this->logService = $service;
    }

    public function beforedi(){
        $service = new LoggingService();
        $service->log("this is my contnet in function before di");
        return ("ok");
    }

    public function methoddi(LoggingService $service){
        $service->log("this is my content using method di");
        return "ok";
    }

    public function dic1(){
        $this->logService->log("this is my content using construstor 1");
        return "ok";
    }

    public function dic2(){
        $this->logService->log("this is my content using construstor 2");
        return "ok";
    }





}
