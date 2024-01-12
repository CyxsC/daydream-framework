<?php

namespace daydream;

class Config{

    public function __construct(){
        
    }

    public static function get($key){
        return \Config::get($key);
    }

    public static function set($key){
        return \Config::get($key);
    }

    public static function getAll(){
        return \Config::get('daydream');
    }

}