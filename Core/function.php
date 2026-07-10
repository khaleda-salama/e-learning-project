<?php

use Core\Response;

function dd($value) {

  echo "<pre>";
   var_dump($value);
  echo "</pre>";
  die();
}
 

function urlIs($value): bool {
    
 return $_SERVER['REQUEST_URI'] === $value; 
}

function abort($code = Response::NOT_FOUND): never {

  http_response_code($code);
  require base_path("views/{$code}.php"); 
  die();
}

function authorize($condition, $status = Response::FORBIDDEN): bool {
   
  if(! $condition) {
    abort($status);
  }
  return true;
}

function base_path(string $path): string {

  return BASE_PATH . $path;
}

function view(string $path, $attr = []): void {
  
  extract($attr);

  require base_path("views/{$path}"); 
}

function redirect(string $path): never {
  
  header("location: {$path}");
  exit();
}

function old(string $key, $default = '') {

 return Core\Session::get('old')[$key]  ?? $default;
}

function previousUrl(): string {

     return $_SERVER['HTTP_REFERER'] ??  '/';
}