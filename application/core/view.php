<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 06.12.2016
 * Time: 5:30
 */
class View
{
    public $msg;
    public $msgError;
    public $template_view = 'template_view';

    function generate($content_view, $template_view, $data = null)
    {
        include 'application/views/' . $template_view;
    }
}
