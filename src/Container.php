<?php

namespace daydream;

use ArrayAccess;
use IteratorAggregate;

class Container implements ArrayAccess, IteratorAggregate{

    // container calss
    private $container = [];

    // has defined
    private $defined = [];

    public function make($name, $arguments = []){
        if($this->define($name)){
            return $this->defined[$name];
        }else{
            return $this->container[$name] = $this->resolve($name, $arguments);
        }
    }

    protected function define($name){

    }

    protected function resolve($name, $arguments = []){
        
    }

    public function __call($name, $arguments){
        return $this->make($name, $arguments);
    }

    public function offsetExists($offset){

    }

    public function offsetGet($offset){ 

    }

    public function offsetSet($offset, $value){

    }

    public function offsetUnset($offset){

    }

    public function getIterator(){

    }
}