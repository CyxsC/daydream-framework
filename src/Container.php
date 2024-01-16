<?php

declare (strict_types = 1);

namespace Daydream;

use ArrayAccess;
use IteratorAggregate;
use ReflectionClass;
use ReflectionMethod;
use ReflectionFunctionAbstract;
use InvalidArgumentException;

class Container implements ArrayAccess, IteratorAggregate{

    protected $bind = [];

    /**
     * container calss
     */ 
    protected $container = [];

    /**
     * has defin
     */ 
    private $defin = [];

    /**
     * Obtain based on alias class
     * @param string $name
     * @return class|object
     */
    public function getAlias(){
        
    }

    /**
     * get define class
     * @param string|class-string<T> $name
     * @return T|object|bool
     */
    protected function defin(string $name){
        if($this->defin[$name]){
            return $this->defin[$name];
        }else{
            return false;
        }
    }

    /**
     * make class
     * @param string|class-string<T> $name
     * @param array $arguments
     * @return T|object
     */
    public function make(string $name, array $arguments = [], bool $newInstance = true){

        if($this->container[$name] && !$newInstance){
            return $this->container[$name];
        }

        $reflect = $this->resolve($name, $arguments);
    }

    /**
     * resolve class
     */
    protected function resolve(string $name, array $arguments = []){
        $reflect = $this->container[$name]?new ReflectionClass($this->container[$name]):new ReflectionClass($name);

        $container = $reflect->getConstructor();

        $this->bindParams($container, $arguments);
    }

    /**
     * bind params
     * @param ReflectionFunctionAbstract $reflect reflect class
     * @param array $arguments  params
     */
    protected function bindParams(ReflectionFunctionAbstract $reflect, array $value = []){
        $argc = [];

        foreach($reflect->getParameters() as $param){
            $name = $param->getName();

            if($param->isVariadic()){
                return array_merge($args, array_values($value));
            }elseif ($param->isDefaultValueAvailable()) {
                $args[] = $param->getDefaultValue();
            } else {
                throw new InvalidArgumentException('method param miss:' . $name);
            }
            // $argc = $arguments;
        }

        return $argc;
    }

    public function __call(string $name, array $arguments){
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