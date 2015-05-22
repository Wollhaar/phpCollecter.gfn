<?php

class Helper {
    public static function isChecked($value1, $value2){
        if($value1 == $value2){
            return 'checked="checked"';
        }
    }
    
    public static function status($value1){
        
        for($i=0; $i < 3; $i++){
            if($i == $value1){
            return $i;
            }
        }
    }
    
    
}
