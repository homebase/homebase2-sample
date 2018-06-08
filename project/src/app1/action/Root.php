<?php

namespace app1\action;


 class T1 { };
 class T2 extends T1 {};
 class T3 extends T2 {};


class Root extends \hb\Action {

    function classConfig() {
        i('config')->_setMany(['_class.app1\action\T3.a.b' => 'xxx']); // internal way - do not DO this !!
        v(C('class.app1\action\T3.a.b'));
        v("Used nodes cache: ", \hb\HB::$CONFIG);
    }

    function iGenerator() {
       echo "hello world";
       \hb\debug("test");
       v( C("i") );
       $g = i('\hbx\tools\IGenerator');
       v($g->_genConfig(C("i")));
       v($g->run(C("i")));
       echo "<pre>";
       \I::cli()->box("some text");
       echo "</pre>";
    }

    function index() {
        $this["x"] = "xxx";
        echo "INDEX";
        \hb\e("{red}hb\\e TEXT{/}");
        \hb\err("{red}hb\\err TEXT{/}");
        echo "End of Action<hr>";
    }

}
