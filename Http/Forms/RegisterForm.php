<?php


namespace Http\Forms;

use Core\ValidationException;


class RegisterForm {

    protected $errors = [];

    public function __construct(public array $data, protected array $rules) {
  
        foreach ($this->rules as $field => $rule) {
            
           if (!array_key_exists($field, $this->data)) continue; 
            
           if (!$rule['validator']($this->data[$field])) {
                $this->errors[$rule['errorKey']] = $rule['message'];
           }
        }
        
    }


    public static function validate(array $data, array $rules): static {
    
      $instanse = new static($data, $rules);

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

}