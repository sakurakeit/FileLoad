<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 09.12.2016
 * Time: 16:44
 */
class Error extends Controller
{
    public $defaulMessage = '<br/>Page not found2!!';

    public function __construct($errMessage)
    {
        parent::__construct();
        if (isset($errMessage)) {
            $this->view->msgError = $errMessage;
        } else {
            $this->view->msgError = $this->defaulMessage;
        }
        $this->view->generate('', 'template_view.php');
    }
} 