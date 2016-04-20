<?php
namespace Acme\controllers;

use Acme\models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Acme\auth\LoggedIn;

class AuthenticationController extends BaseController
{
    /**
     *
     * Shows the login page
     * @return html
     */
    public function getShowLoginPage()
    {
        echo $this->blade->render("login");
    }

    public function postShowLoginPage()
    {
        //echo "Posted!"; exit;
/*        if (!$this->signer->validateSignature($_POST['_token'])) {
            header('HTTP/1.0 400 Bad Request');
            exit();
        }*/

        $okay = true;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        //look up the user
        $user = User::where('email', '=', $email)
            ->first();

        if ($user != null) { // validate credentials
            if (! password_verify($password, $user->password)) {
                $okay = false;
            }
        } else {
            $okay = false;
        }

        if ($okay) {  // if valid and
          if ($user->active != 0) { // active
            $_SESSION['user'] = $user;
            header("Location: /");
            exit();
          } else {
            $msg = "User not activated";
          }
        } else { // if not valid
          $msg = "Invalid login!";
        }

        // Redirect to login page
        $_SESSION['msg'] = [$msg];
        echo $this->blade->render("login");
        unset($_SESSION['msg']);
        exit();
    }

    public function getLogout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: /login");
        exit();
    }

    public function getTestUser()
    {
      //dd($_SESSION['user']);
      $user = LoggedIn::user();
      if ($user) {
        echo "$user->first_name $user->last_name : $user->email";
        dd($user->testimonials);
      } else {
        echo "No user loged in!";
      }
    }
}
