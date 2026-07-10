<?php


namespace Core\Middleware;
use Core\Middleware\Guest;
use Core\Middleware\Admin;
use Core\Middleware\Instructor;
use Core\Middleware\Student;


class Middleware {

 public const MAP = [

    'guest'       => Guest::class,
    'admin'       => Admin::class,
    'instructor'  => Instructor::class,
    'student'     => Student::class,
 ];

 public static function resolve($key): void {

   if(!$key) {
      return;
   }

   $middleware = static::MAP[$key] ?? false;

   if(!$middleware) {
      throw new \Exception("No matching midleware found for key '{$key}'.");   
   }
      
   (new $middleware)->handle();  
 }

}