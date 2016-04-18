<?php namespace Acme\Validation;

use Respect\Validation\Validator as Valid;

class Validator {

  public function isValid($v_data) {
    $errors = [];

    foreach ($v_data as $name => $value) {
      if (isset($_REQUEST[$name])) {
        $rules = explode("|", $value);

        foreach ($rules as $rule) {
          $explode = explode(":", $rule);

          switch ($explode[0]) {
            case 'email':
              if (! Valid::email()->validate($_REQUEST[$name])){
                $errors[] = $name . " must be a valid email!";
              }
              break;

            case 'min':
              $min = $explode[1];
              if (! Valid::stringType()->length($min)->validate($_REQUEST[$name])){
                $errors[] = $name . " must be at least " . $min . " characters long!";
              }
              break;

            case 'equalTo':
              if (! Valid::equals($_REQUEST[$name])->validate($_REQUEST[$explode[1]])){
                $errors[] = $name . " and " . $explode[1] . " do not match!";
              }
              break;

            case 'alpha':
              if (! Valid::alpha()->validate($_REQUEST[$name])){
                $errors[] = $name . " must contain only letters!";
              }
              break;

            default:
              $errors[] = "Comparator '" . $explode[0] . "' not supported!";
              break;
          }
        }
      } else {
        $errors[] = "Parameter '" . $name . "' not found in current request!";
      }
    }
    return $errors;
  }
}
