<?php
require_once "password.class.php";
/**
 * Handellogin controlls the login action
 *
 * @author Daniel Costello
 * @property private $model Holds the Authorization model
 * @property private $username Holds post value for username
 * @property private $password Holds post value for password
 *
 */
class Handellogin extends Password
{

    private $model;
    private $username;
    private $password;

    public function __construct($username, $password, $model)
    {

        $this->model = $model;
        $this->username = trim($username);
        $this->password = trim($password);
    }

    public function HandelAuthorization()
    {

        $result = $this->model->GetAuthorization($this->username);

        if ($result->errorInfo) {

            return $result->getMessage();
        }

        if ($this->password_verify($this->password, $result['password']) == 1) {

            $_SESSION['loggedin'] = true;
            $_SESSION['memberID'] = $user['memberID'];
            $_SESSION['username'] = $user['username'];
        } else {

            return 'Wrong username or password';
        }

    }
}
