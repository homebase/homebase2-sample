<?php

define("APP_DIR", __DIR__);
include dirname(__DIR__)."/init.php";  // project init

\hb\HB::dispatch();
