<?php


namespace Core;
  
class App {

  protected static $container; 
   
  public static function setContainer($container): void {

     static::$container = $container; 
  }

  public static function getContainer(): mixed {
    
     return static::$container;
  }

  public static function bind($key, $func): void {
    
      static::getContainer()->bind($key, $func);
  }

  public static function resolve($key): mixed {
    
     return static::getContainer()->resolve($key);
  }

}

