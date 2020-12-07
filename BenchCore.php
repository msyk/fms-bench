<?php
require_once 'lib/INTER-Mediator/vendor/autoload.php';
require_once 'lib/INTER-Mediator/vendor/yodarunamok/fxphp/lib/datasource_classes/RetrieveFM7Data.class.php';

use INTERMediator\DB\Proxy;

abstract class BenchCore
{
    protected $contextDef = [];
    protected $optionDef = [];
    protected $connectionDef = [];

    public function __construct()
    {
        $this->contextDef[] = [
            'name' => 'JPCode',
            'key' => '-rec',
            'records' => '500',
            'query' => [
                //['field' => 'f8', 'operator' => 'eq', 'value' => '=中野区'],
            ],
            'portals' => [],
            'paging' => true,
        ];
        $this->connectionDef['server'] = '192.168.17.109';
        $this->connectionDef['database'] = 'JPCode';
        $this->connectionDef['user'] = 'admin';
        $this->connectionDef['password'] = 'mysecretpassword';
        $this->connectionDef['datatype'] = 'FMPro19';
        $this->connectionDef['cert-verifying'] = false;
    }

    function readTest()
    {
        $maxRecords = 100000;
        $repeatTimes = 100;
        $accum = 0;
        $dbInstance = new Proxy(true);
        $dbInstance->ignoringPost();
        for ($i = 0; $i < $repeatTimes; $i += 1) {
            $dbInstance->initialize($this->contextDef, $this->optionDef, $this->connectionDef, 2, "JPCode");
            $dbInstance->dbSettings->setStart(rand(0, $maxRecords));
            $startTime = microtime(true);
            $dbInstance->processingRequest("read");
            $endTime = microtime(true);
            $accum += ($endTime - $startTime);
            $pInfo = $dbInstance->getDatabaseResult();
//            var_export($pInfo);
        }
        $avg = $accum / $repeatTimes;
        echo "{$repeatTimes} times, average {$avg} s.";
        $logInfo = $dbInstance->logger->getMessagesForJS();
        var_export($logInfo);
        $dbInstance->logger->clearLogs();
    }

}