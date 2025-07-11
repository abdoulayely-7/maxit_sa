<?php
namespace app\core;
class Validator {
  private static array $errors = [];
  public static function isEmail(string $email,string $key,string $sms):bool{
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        Validator::addError("$key", "$sms");
    }
    return true;
  }
  public static function isEmpty(string $value,string $key,string $sms):bool{
    if(trim($value)===""){
      Validator::addError("$key","$sms");
    }
    return true;
  }
  public static function getErrors():array{
    return self::$errors;
  }
  public static function addError(string $key, string $message):void{
    self::$errors[$key][]=$message;  
  }
  public static function isValid():bool{
    return empty(self::$errors);
  }
  public static function resetErreur(){
    return self::$errors=[];
  }
}