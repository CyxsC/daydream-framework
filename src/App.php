<?php 

namespace daydream;

use Daydream\Container;
use Daydream\Coed;
use Daydream\Call;
use Daydream\Config;
use Daydream\Http;
use Daydream\Request;
use Daydream\Route;
use Daydream\Middleware;

class App extends Container{

    protected $indexpath;

    protected $daydreampath;

    private $container = [
        "App" => App::class,
        "Coed" => Coed::class,
        "Call" => Call::class,
        "Config" => Config::class,
        "Route" => Route::class,
        "Middleware" => Middleware::class,
        "Http" => Http::class,
        "Request" => Request::class,
    ];

    public function __construct(){
        $this->$daydreampath = dirname(__FILE__).DIRECTORY_SEPARATOR;
        echo json_encode ($this->$daydreampath);
        // 加载配置
        // $this->config();
        // 加载路由
        // $this->route();
        // 加载控制器
        // $this->controller();
    }

    private function route(){
        $route = new \daydream\Route();
        $route->run();
    }

    // 加载配置
    private function config(){
        $config = require_once $indexpath.'config/config.php';
        foreach($config as $key => $value){
            \daydream\Config::set($key, $value);
        }
    }

    private function controller(){
        $controller = \daydream\Config::get('route.controller');
        $controller = new $controller();
        $controller->$action($params);
    }
}