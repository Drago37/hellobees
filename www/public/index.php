<?php

declare(strict_types=1);

//phpinfo();

$datetime = new DateTime();
var_dump($datetime);
$datetime->setTimestamp(1111);
var_dump($datetime);