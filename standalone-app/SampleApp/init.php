<?php

define("APP_DIR", __DIR__);
include __DIR__."/vendor/hb2/src/homebase-bundle.inc.php";  // homebase project init
\hb\HB::dispatch();