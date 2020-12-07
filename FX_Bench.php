<?php

require_once 'BenchCore.php';

class FX_Bench extends BenchCore
{
    public function __construct()
    {
        $this->connectionDef['db-class'] = 'FileMaker_FX';
        $this->connectionDef['port'] = '80';
        $this->connectionDef['protocol'] = 'HTTP';
        parent::__construct();
    }

}