#!/usr/bin/php
<?php

include __DIR__."/../init.php";

// project-specific init
# iprofiler()->enable(true);  // turn on profiler EVEN in cli mode    ## same as "--profile"
# iprofiler()->trace(); // echo all profiler calls (debug mode only)  ## same as "--trace"
# iprofiler()->trace('File', ['filename' => 'trace.log']); // save all profiler calls to file (debug mode only)
echo i('cli')->red("red bold text", "bold"), "\n";
i('cli')->e("{red}{bold}%s{/}\n", "red bold text");

iprofiler()->in("a");
  iprofiler()->in("b");
    iprofiler()->in("b:1");
    iprofiler()->out();
    iprofiler()->in("b:2");
     usleep(2000);
    iprofiler()->out();
    iprofiler()->in("b:3");
    i('cli')->box("Hello World");
    iprofiler()->out();
  iprofiler()->out(['x' => 1]);
iprofiler()->out();
iprofiler()->in("cc");
iprofiler()->out();

# iprofiler()->debug();
