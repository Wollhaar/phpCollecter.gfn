<?php

define('ERROR_FIRSTNAME', 100);
define('ERROR_LASTNAME', 110);
define('ERROR_EMAIL', 200);
define('ERROR_PASSWORD', 300);
define('ERROR_PASSWORD_CONFIRM', 310);
define('ERROR_TITLE', 400);
define('ERROR_EMPTY', 500);

class Validator {
    private $error = array();
    
    public function validate(array $values) {
        $this->ifEmpty($values);
        $this->title($values['title']);
        $this->name($values['firstname'], 'f');
        $this->name($values['lastname'], 'l');
        $this->email($values['email']);
        $this->password($values['password']);
        $this->passwordConfirm($values['password'], $values['password_confirm']);
    }
    
    public function ifEmpty($values){
        if(empty($values['title'] || $values['firstname'] || $values['lastname'] || $values['email'] || $values['password'] || $values['password_confirm'])){
            $this->error[] = ERROR_EMPTY;
        }
        elseif (empty($values['firstname'])) {
            $this->error[] = ERROR_FIRSTNAME;
    }
        elseif (empty($values['lastname'])) {
            $this->error[] = ERROR_LASTNAME;
    }
        elseif (empty($values['email'])) {
            $this->error[] = ERROR_EMAIL;
    }
        elseif (empty($values['password'])) {
            $this->error[] = ERROR_PASSWORD;
    }
        elseif (empty($values['password_confirm'])) {
            $this->error[] = ERROR_PASSWORD;
    }
    }

        public function title($values){
        if(!isset($values) || empty($values)){
            $this->error[] = ERROR_TITLE;
        }
    }

        private function name($value, $typ) {
        $regex = '/^[a-zA-ZäüöÄÜÖ]+$/';
        if(!$this->check($value, $regex)){
            if($typ == 'f'){  //Variable im Falle des Nachnamens leer......
                $this->error[] = ERROR_FIRSTNAME;
            }  else {
                $this->error[] = ERROR_LASTNAME;
            }
        }
    }
    
    public function email($value){
        $regex = '/^[a-z0-9\-_]?[a-z0-9.\-_]+[a-z0-9\-_]?@[a-z.-]+\.[a-z]{2,}$/';
        if(!$this->check($value, $regex)){
            $this->error[] = ERROR_EMAIL;
        }
    }


    public function password($value) {
        $regex = '/^.{6,20}$/';
        if(!$this->check($value, $regex)){
            $this->error[] = ERROR_PASSWORD;
        }
    }
    
    public function passwordConfirm($pass1, $pass2){
        if (trim($pass1) != trim($pass2)){
            $this->error[] = ERROR_PASSWORD_CONFIRM;
        }
    }
    
    private function check($value, $regex) {
        if (preg_match($regex, $value)){
            return true;
        } else{
            return false;
        }
    }
    
    public function getError(){
        return $this->error;
    }
}
