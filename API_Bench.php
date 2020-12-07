<?php

require_once 'BenchCore.php';
require_once 'lib/INTER-Mediator/vendor/inter-mediator/fmdataapi/FMDataAPI.php';

use INTERMediator\FileMakerServer\RESTAPI\FMDataAPI;

class API_Bench extends BenchCore
{
    public function __construct()
    {
        $this->connectionDef['db-class'] = 'FileMaker_DataAPI';
        $this->connectionDef['port'] = '443';
        $this->connectionDef['protocol'] = 'HTTPS';
        parent::__construct();
    }
}