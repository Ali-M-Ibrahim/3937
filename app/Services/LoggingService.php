<?php

namespace App\Services;


class LoggingService{
    public function log($content){
        logger($content);
        error_log($content);
    }
}
