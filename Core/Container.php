<?php



namespace Core;


class Container {

    protected $bindings = [];

    public function bind(string $key,  $func): void {

     $this->bindings[$key] = $func; 
    }

    public function resolve(string $key): mixed {
        
        if(!array_key_exists($key, $this->bindings)) {

           throw new \Exception("No Matching Binding Found For {$key}.");
        }
        
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);   
    }
    
} 