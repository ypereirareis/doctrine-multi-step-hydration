
<?php

ini_set('memory_limit','2048M');
$memory = (int)ini_get("memory_limit");
echo 'PHP Memory: '.$memory."\n";


function getMemoryUsage()
{
    $memory = round(memory_get_usage(true) / (1024 * 1024), 0); // to get usage in Mo
    $memoryMax = round(memory_get_peak_usage(true) / (1024 * 1024)); // to get max usage in Mo
    $message = 'Used Memory: current='.$memory.'Mo peak='.$memoryMax.'Mo';

    return $message;
}