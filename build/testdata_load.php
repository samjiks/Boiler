<?php
require __DIR__."/../config.php";
exec("mysql -u {$settings['database']['user']} -p{$settings['database']['passwd']} -h {$settings['database']['server']} -P {$settings['database']['port']} {$settings['database']['db']} < '".__DIR__."/testdata.sql'");
