<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 06.12.2016
 * Time: 5:43
 */
class Controller_Main extends Controller
{
    function action_index()
    {
        $data['session_useremail'] = $_SESSION['session_useremail'];
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    function action_login()
    {
        if (isset($_POST["login"])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                if (Route::loadModel("Users")) {
                    $model = new Model_users();
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $userInfo = $model->checkUser($email, $password);

                    if ($userInfo) {
                        $_SESSION['session_useremail'] = $email;
                        header("Location: " . Route::getBaseUrl() . "/main/index");
                    } else {
                        $_SESSION['session_useremail'] = '';
                        $message_err = "Invalid username or password!";
                    }
                } else {
                    $message_err = "Model not found";
                }
            } else {
                $message_err = "All fields are required!";
            }
        }
        if (!empty($message_err)) {
            $this->view->msgError = $message_err;
        } else {
            $this->view->msgError = '';
        }
        $this->view->generate('login_view.php', 'template_view.php');
    }

    function action_logout()
    {
        unset($_SESSION['session_useremail']);
        unset($_SESSION['session_message_error']);
        unset($_SESSION['count']);
        session_destroy();

        header("Location: " . Route::getBaseUrl() . "/main/index");

    }

    function action_register()
    {
        if (isset($_POST["register"])) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                if (Route::loadModel("Users")) {
                    $model = new Model_users();
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $userId = $model->getUserId($email);
                    if (!empty($userId)) {
                        $message_err = "That username already exists! Please try another one!";
                    } else {
                        $rez = $model->insertUser($email, $password);
                        if (!empty($rez)) {
                            $message = "You are registered!";
                            $_SESSION['session_useremail'] = $email;
                            header("Location: " . Route::getBaseUrl() . "/main/index");

                        } else {
                            $message_err = "Failed to insert data information!";
                        }
                    }
                } else {
                    $message_err = "Model not found";
                }
            } else {
                $message_err = "All fields are required!";
            }
        }
        if (isset($message)) {
            $this->view->msg = $message;
        }
        if (isset($message_err)) {
            $this->view->msgError = $message_err;
        }
        $this->view->generate('register_view.php', 'template_view.php');
    }
    /*
     * if (isset($_POST["register"])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM tbl_user WHERE email='" . $email . "'";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $numRows = count($rows);
        if ($numRows == 0) {
            $sql = "INSERT INTO tbl_user ( email, password) VALUES('$email', '$password')";
            $stmt2 = $dbh->prepare($sql);
            $stmt2->execute();
            $result = $stmt2->rowCount();
            if ($result > 0) {
                session_start();
                $_SESSION['session_username'] = $email;
                header("Location: load.php");
            } else {
                $message = "Failed to insert data information!";
            }
        } else {
            $message = "That username already exists! Please try another one!";
        }
    } else {
        $message = "All fields are required!";
    }
}
     *
     * */
}