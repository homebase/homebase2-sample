<?
namespace SampleApp\action;

class Root extends \hb\Action {

    function index() {
        echo "index";
        $this["x"] = "xxx";
    }

}
