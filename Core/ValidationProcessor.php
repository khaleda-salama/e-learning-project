<?php


namespace Core;
use Core\ValidationException;

class ValidationProcessor {

    public $errors = [];

   public function __construct(public array $data, protected array $rules) {
               
        foreach ($this->rules as $field => $rule) {
               
            if (!array_key_exists($field, $this->data)) continue; 
        
            if (!$rule['validator']($this->data[$field])) {
                $this->errors[$rule['errorKey']] = $rule['message'];
            }
        }
   }


   public static function prepare(array $data, array $rules): static {
    
     return new static($data, $rules);
   }

   public function throwErrors() {
       
    if($this->failed()) {
        $this->throw();
    }       
   }
         
   
  public function failed() {

     return count($this->errors);
  }
  public function errors() {
    return $this->errors;    
  }

  public function throw() {
        
      ValidationException::throw($this->errors(),  $this->data);
  }


  public function mergeErrors($errors) {
    $this->errors = array_merge($this->errors, $errors);
  }


  public function error($filed, $message) {
    $this->errors[$filed] = $message; 

    return $this;
  }




}

