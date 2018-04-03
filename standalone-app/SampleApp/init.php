<?php

define("APP_DIR", __DIR__);
#include "/proj/vendor/homebase2/src/homebase-bundle.inc.php";  // homebase project init
include __DIR__."/vendor/hb2/src/homebase-bundle.inc.php";  // homebase project init
\hb\HB::dispatch();
