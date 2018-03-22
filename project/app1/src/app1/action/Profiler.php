<?php

namespace app1\action;


use function hb\dbg;  // use ?DEBUG=1 or --debug=1 to see this messages

/*
 * Sample Nested and Deep Profiling Example
 **/


function A_Project($callable, ...$args) {
    return $callable(...$args);
}

class XXX_Very_Very_Long_ClassName {

    function veryVeryLong_Method__Name($a, $b, $c, $d) {
        return A_Project(__NAMESPACE__."\\"."XXX_Very_Very_Long_ClassName::methodName", $b, [$a, [$c, $d]]);
    }

    static function methodName($param1, &$param2, $deep = 0) {
        $P = profiler(__FUNCTION__, $param1);
        dbg(1, "in-here");
        // hb\e(hb\HB::$Q);
        usleep(800);
        iprofiler()->info("info", ['reason' => 'test:', 'p' => $param1]);
        usleep(900);
        if ($deep == 3) {
            static $cnt = 0;
            if (! $cnt++)
                iprofiler()->alert("alert",['reason' => 'test alert', 'p' => $param1]);
        }
        elseif ($deep == 4)
            iprofiler()->warn("warning",['reason' => 'test warning', 'p' => $param1]);
        else
            iprofiler()->info("some info",['rxx' => 'test', \hb\Str::random(3)]);
        if ($deep > 4) {
            $API_KEY = \hb\Str::random(6);
            iprofiler()->info("api-call", ["xxarams" => $param1], ['api' => $API_KEY]);
            return;
        }
        if ($deep > 3)
            iprofiler()->inHide("xx$deep", [\hb\Str::random(3) => \hb\Str::random()], ['tag' => $deep & 1 ? 'sql' : 'mongo', 'details' => '/dvp/vvv']);
        else
            iprofiler()->in("xx$deep", [\hb\Str::random(2) => \hb\Str::random(5)], ['tag' => 'sql', 'edit' => "/dvp/edit"]);
        usleep(900);
        $x = [1,2];
        self::methodName($deep, $x, $deep+1);
        self::methodName($deep."x", $x, $deep+1);
        iprofiler()->out();
        # <h1>H1sdfs</h1>
        #1/0;
        #C(str_repeat("unknonwn.node;", 22));
    }

}


class Profiler extends \hb\Action {

    # uri: /profiler/
    function index() {
        echo "<h1>Complex Profiling Example</h1>";

        $API_KEY = \hb\Str::random(6);
        iprofiler()->in("api-call-wrapper", ["api-params" => 'outter api call'], ['api' => $API_KEY, 'style' => 'hide']);
         iprofiler()->api("api-call", ["api-params"]);
         iprofiler()->info("opts[link] + args[0]", ['arg[0] text', 'a' => 'A'], ['link' => '/url/', 'edit' => '/xxx']);
         iprofiler()->inHide("in and hide", ['text'], ['details' => '/url/', 'edit' => '/xxx']);
          iprofiler()->api("api-call internal", ["api-params 2"]);
          usleep(60200);
          $a = str_repeat("xxx", 400000);
         iprofiler()->out(['arg-in-out' => "a"]);
         unset($a);
        iprofiler()->out(['arg-in-out' => "b"]);


        $x = new XXX_Very_Very_Long_ClassName();
        $x->veryVeryLong_Method__Name("a", [1,2,3], "b", str_repeat("abC-", 22), $_SERVER);
        unset($P);


        return 0;
    }

}
