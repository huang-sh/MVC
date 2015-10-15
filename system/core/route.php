<?php

/**
 * Description of route
 *
 * @author huangshihuai_91
 */
final class route {

    public $uriQuery = '';

    public function __construct() {
        // 获取URI请求路径
        $this->uriQuery = parse_url($_SERVER['REQUEST_URI']);
    }

    public function __destruct() {
        unset($this->uriQuery);
    }

    public function getPathToArray() {
        $arrPath = (!empty($this->uriQuery['path'])) ? explode('/', $this->uriQuery['path']) : array();
        $result = array();

        if (!empty($arrPath)) {
            foreach ($arrPath as $path) {
                if (!empty($path)) {
                    $result[] = $path;
                }
            }
            unset($arrPath);
        }
        return $result;
    }

    public function getQueryToArray() {
        $arrQuery = (!empty($this->uriQuery['query'])) ? explode('&', $this->uriQuery['query']) : array();
        $result = array();
        if (!empty($arrQuery)) {
            foreach ($arrQuery as $query) {
                $temp = explode('=', $query);
                $result[$temp[0]] = $temp[1];
                unset($temp);
            }
        }
        return $result;
    }

    public static function questRun($uriPath, $uriParame) {

        $control = APP_CONTROL;
        if (!empty($uriPath)) {
            for ($index = 0; $index < count($uriPath); ++$index) {
                $control = $control . '/' . $uriPath[$index];
                if (is_dir($control)) {
                    continue;
                } else if (is_file($control . '.php')) {
                    $class = $uriPath[$index];
                    require $control . '.php';
                    $obj = new $class;
                    $fun = ((empty($uriPath[++$index])) ? '' : $uriPath[$index]);
                    break;
                }
            }
        } else {
            $fun = 'index';
            require APP_CONTROL . '/index.php';
            $obj = new index;
        }
        if (empty($obj)) {
            require APP_CONTROL . '/index.php';
            $obj = new index();
            if (method_exists($obj, 'pageError')) {
                $obj->pageError();
                return;
            } else {
                die('This Not Fount');
            }
        }

        if (empty($fun)) {
            $obj->index();
        } else {
            $obj->$fun();
        }
    }

}
