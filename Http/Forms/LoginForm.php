<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm {

    protected $errors = [];

    public function __construct(public array $data) {
                            
        if (!Validator::valid($data['username'], 5)) {
            $this->errors['username'] = 'اسم المستخدم يجب ان يكون اكثر من 5 حروف';       
        }

        if (!Validator::valid($data['password'], 7)) {
            $this->errors['password'] = 'كلمة المرور يجب ان تكون اكثر من 7 حروف';  
        }
    }


    public static function validate(array $data): static {
    
      $instanse = new static($data);

      return $instanse->failed() ? $instanse->throw() : $instanse;
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


  public function error($filed, $message) {
    $this->errors[$filed] = $message; 

    return $this;
  }

}

