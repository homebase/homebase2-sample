<?
namespace SampleApp\action;

class Root extends \hb\Action {

    function index() {
        echo "index";
        $this["x"] = "xxx";
        \hb\e("{red}hb\\e TEXT{/}");
        \hb\err("{red}hb\\err TEXT{/}");
        //v(C("app.a2.x.xxy"));
        //v(i('config')->config());
    }

}
