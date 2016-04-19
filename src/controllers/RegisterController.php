<?php namespace Acme\Controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class RegisterController extends BaseController
{
  public function getShowRegisterPage() {
    //echo $this->twig->render('register.html');
    echo $this->blade->render("register");
  }

  public function postShowRegisterPage() {
    // validate data
    $v_data = [
      'first_name' => 'min:3|alpha',
      'last_name' => 'min:3|alpha',
      'email' => 'email|equalTo:verify_email',
      'verify_email' => 'email',
      'password' => 'min:3|equalTo:verify_password',
    ];

    //$v_data2 = ['username' => 'min:3',];

    $validator = new Validator;
    $errors = $validator-> isValid($v_data);

    if (sizeof($errors) > 0) {
      $_SESSION['msg'] = $errors;
      //header("Location: /register");
      //echo $this->twig->render('register.html', ['errors' => $errors]);
      //echo $this->blade->render("register", ['errors' => $errors]);
      echo $this->blade->render("register");
      unset($_SESSION['msg']);
      exit();
    }

    // if validation fails, go back to register
    // page and display error message
    //exit();

    // save this data into a database
    $user = new User();
    $user->first_name = $_REQUEST['first_name'];
    $user->last_name = $_REQUEST['last_name'];
    $user->email = $_REQUEST['email'];
    $user->password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    //$user-> = $_REQUEST[''];
    $user->save();

    header("Location: /success");
    exit();
  }

  public function getTestDB() {
    $user = User::find(1);
    echo "User name is " . $user->first_name . " " . $user->last_name;
  }
}
