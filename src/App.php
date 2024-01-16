<?php 

declare (strict_types = 1);

namespace Daydream;

use Daydream\Container;

class App extends Container{

    /**
     * application start time
     */
    protected $start;

    /**
     * app files path
     */
    protected $appPath;

    /**
     * franmework files path
     */
    protected $daydreamPath;

    protected $container = [
        "app" => App::class,
        "coed" => Coed::class,
        "call" => Call::class,
        "config" => Config::class,
        "route" => Route::class,
        "middleware" => Middleware::class,
        "http" => Http::class,
        "request" => Request::class,
    ];

    public function __construct(){
        $this->$daydreamPath = dirname(__FILE__, 2).DIRECTORY_SEPARATOR;
        $this->$appPath = dirname(__FILE__, 2).DIRECTORY_SEPARATOR;

        $this->init();
    }

    protected function init(){
        include_once $this->$daydreampath.'helper.php';

        // 加载配置
        // $this->config();
        // 加载路由
        // $this->route();
        // 加载控制器
        // $this->controller();
    }

    private function route(){
        $route = $this->route;
        $route->run();
    }

    // 加载配置
    private function config(){
        // foreach($config as $key => $value){
        //     \daydream\Config::set($key, $value);
        // }
    }

    private function controller(){
        // $controller = new $controller();
        // $controller->$action($params);
    }
}