<?php

require_once 'API_Bench.php';
require_once 'FX_Bench.php';

if (!isset($_GET['m']) || ($_GET['m'] == 1)) {
    $accum = 0;
    $startTime = microtime(true);
    $api = new API_Bench();
    $api->readTest();
    $endTime = microtime(true);
    $accum += ($endTime - $startTime);
    echo "<br>Took {$accum} s.";

    echo "<hr>";

    $accum = 0;
    $startTime = microtime(true);
    $fx = new FX_Bench();
    $fx->readTest();
    $endTime = microtime(true);
    $accum += ($endTime - $startTime);
    echo "<br>Took {$accum} s.";
} else if ($_GET['m'] == 2) {
    $sec = -1;
    $prev = -2;
    while ($sec > $prev) {
        $prev = $sec;
        $sec = intval((new DateTime())->format('s'));
        sleep(1);
    }
    $startClock = (new DateTime())->format('Y-m-d H:i:s');
    echo "FX Test Starts: {$startClock}<br>";
    $accum = 0;
    $startTime = microtime(true);
    $api = new FX_Bench();
    $api->readTest();
    $endTime = microtime(true);
    $accum += ($endTime - $startTime);
    echo "<br>Took {$accum} s.";

} else if ($_GET['m'] == 3) {
    $sec = -1;
    $prev = -2;
    while ($sec > $prev) {
        $prev = $sec;
        $sec = intval((new DateTime())->format('s'));
        sleep(1);
    }
    $startClock = (new DateTime())->format('Y-m-d H:i:s');
    echo "API Test Starts: {$startClock}<br>";
    $accum = 0;
    $startTime = microtime(true);
    $api = new API_Bench();
    $api->readTest();
    $endTime = microtime(true);
    $accum += ($endTime - $startTime);
    echo "<br>Took {$accum} s.";

}