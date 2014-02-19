<?php

namespace Stone\LibLoader\Whoops;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

$run     = new Run;
$handler = new PrettyPageHandler;

$run->pushHandler($handler);

$run->register();