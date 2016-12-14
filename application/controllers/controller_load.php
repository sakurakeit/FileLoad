<?php

class Controller_Load extends Controller
{

    public function action_index()
    {
        if (Route::loadModel("Files")) {
            $model = new Model_files();
            $email = $_SESSION["session_useremail"];

            $fileTable = $model->getUserFiles($email);
            $data['fileTable'] = $fileTable;
        }
        $data['session_useremail'] = $_SESSION['session_useremail'];
        $this->view->generate('load_view.php', 'template_view.php', $data);

    }

    public function action_loadFile()
    {
        $userEmail = $_SESSION["session_useremail"];
        if (isset($userEmail)) {
            if (Route::loadModel("Users")) {
                $model = new Model_users();
                $userId = $model->getUserId($userEmail);
            }
        }
        if (!empty($userId)) {
            $maxFileSize = 102400;
            $type = $_FILES['somename']['type'];
            $size = $_FILES['somename']['size'];
            $err = $_FILES['somename']['error'];
            $name = $_FILES['somename']['name'];
            $info = new SplFileInfo($name);
            $fileExtension = $info->getExtension();
            $nameHash = hash('adler32', substr($name,0,strrpos($name, ".".$fileExtension)).$userEmail).".".$fileExtension;

            if ($this->get_file_exists($nameHash)) {
                $message_err = "File has been loaded!";
            } else {
                if ($err == 0) {
                    if ($size > $maxFileSize) {
                        $message_err = "File very big! Max size is 100KB!";
                    } else {
                        $fileName = $nameHash;
                        $uploadfile = "files/" . $fileName;
                        if (move_uploaded_file($_FILES['somename']['tmp_name'], $uploadfile)) {
                            if (Route::loadModel("Files")) {
                                $model = new Model_files();
                                $rez = $model->insertFile($fileName, $userId, $name);
                            }
                            if ($rez > 0) {
                                $message = "File successfully downloaded!";
                                $message_err = '';
                            } else {
                                $message_err = "Failed to insert data information!";
                            }
                        } else {
                            $message_err = "File not load. Try against!";
                        }

                    }
                } elseif ($_FILES['somename']['name'] == '') {
                    $message_err = "Select a File";
                } else {
                    $message_err = "File not load. Try against!";
                }
            }
            if (isset($message)) {
                $this->view->msg = $message;
            }
            if (isset($message_err)) {
                $this->view->msgError = $message_err;
            }
            $this->action_index();
        }
    }

    private function get_file_exists($vFileName)
    {
        $filename = 'files' . '/' . $vFileName;
        if (file_exists($filename) && ($vFileName != '')) {
            return true;
        } else {
            return false;
        }
    }

}