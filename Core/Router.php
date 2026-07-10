<?php

namespace Core;
use Core\Middleware\Middleware;

class Router {

    protected $routes = [];

    public function add($method, string $uri, $controller): static {
        $this->routes[] = [
            
            
            'uri' =>  $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get(string $uri, $controller): Router {
      
       return $this->add('GET',  $uri, $controller);
    }
    public function post (string $uri, $controller): Router{
        
        return $this->add('POST',  $uri, $controller);   
    }
    public function delete (string $uri, $controller): Router{
        
        return $this->add('DELETE',  $uri, $controller);
    }
    public function patch (string $uri, $controller): Router{
        
        return $this->add('PATCH',  $uri, $controller);
    }
    public function put (string $uri, $controller): Router{
        
        return $this->add('PUT',  $uri, $controller);
    }

    public function only($key): static {
         
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;      
    }

    public function route (string $uri, $method) {
      
      foreach($this->routes as $route) { 

        if($route ['uri'] ===  $uri && $route['method'] === strtoupper($method)) {

          Middleware::resolve($route['middleware']);  
            
          return require base_path('Http/controllers/'.$route['controller']);
        }
      }
      
      $this->code(); 
    }

    public function previousUrl(): string {

     return $_SERVER['HTTP_REFERER'];
    }
    
    protected function code($code = 404): never {
        http_response_code($code);
        
        require base_path("views/{$code}.php");
        
        die();
    }
        
}





