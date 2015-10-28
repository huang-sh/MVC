<?php

/**
 * Description of route
 *
 * @author huangshihuai_91
 */
final class route {

    public $uriQuery = array();
    protected $defaultIndex = 'index';
    protected $page404 = 'page404';
    protected $funArgument = array();
    protected $loadClass = array(); /* filePath,className,function */

    public function __construct() {
        // 获取URI请求路径
        $this->uriQuery = parse_url($_SERVER['REQUEST_URI']);
    }

    public function __destruct() {
        unset($this->uriQuery);
    }

    /**
     * 路劲以及函数参数
     * @return type
     */
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

    /**
     * 请求的参数
     * @return type
     */
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

    /**
     * 路由解析
     * @param type $uriPath
     */
    public function AnalyticalRoute($uriPath) {

        $control = APP_CONTROL;
        $index = 0;
        $this->loadClass = array();
        $this->funArgument = array();
        if (!empty($uriPath)) {
            // 判断路径,参数是否正确
            for (; $index < count($uriPath); ++$index) {
                $control .= '/' . $uriPath[$index];
                if (is_dir($control)) {
                    continue;
                } else if (is_file($control . '.php')) {
                    $this->loadClass = array(
                        'filepath' => $control . '.php', // 路径
                        'classname' => $uriPath[$index], // className
                        'functionname' => (empty($uriPath[++$index]) ? $this->defaultIndex : $uriPath[$index]), // fun
                    ); // 获取函数传递的内容
                    $this->funArgument = array_slice($uriPath, ++$index);
                    return;
                }
                // 出错了--处理
                $this->loadClass = $this->loadError();
                return;
            }
        }
        // 不存在则默认访问
        if (empty($this->loadClass)) {
            $filePath = $control . '/' . $this->defaultIndex . '.php';
            if (is_file($filePath)) {
                $this->loadClass = array(
                    'filepath' => $filePath,
                    'classname' => $this->defaultIndex,
                    'functionname' => $this->defaultIndex,
                );
                // 获取函数传递的内容
                $this->funArgument = array_slice($uriPath, $index);
                return;
            } else {
                // 出错了--处理
                $this->loadClass = $this->loadError();
                return;
            }
        }
    }

    /**
     * 设置错误请求
     * @return type
     */
    protected function loadError() {
        $filePath = APP_CONTROL . '/' . $this->defaultIndex . '.php';
        if (!is_file($filePath)) {
            die('This Pages Not Fount');
        }
        require_once $filePath;
        $funList = get_class_methods($this->defaultIndex);
        if (empty($funList) || !in_array($this->page404, $funList)) {
            die('This Pages Not Fount');
        }
        return array(
            'filepath' => $filePath,
            'classname' => $this->defaultIndex,
            'functionname' => $this->page404,
        );
    }

    /**
     * 执行
     * @return type
     */
    public function questRun() {

        if (empty($this->loadClass) || !is_file($this->loadClass['filepath'])) {
            die('This Page Not Funt');
        }
        require_once $this->loadClass['filepath'];
        $obj = new $this->loadClass['classname'];
        if ($obj && method_exists($obj, $this->loadClass['functionname'])) {
            call_user_func_array(array($obj, $this->loadClass['functionname']), $this->funArgument);
            return;
        }
        die('This Function Not Fount');
    }

}
