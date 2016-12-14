<?php
/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 06.12.2016
 * Time: 5:30
 */
class Model
{
    public $db;
    function __construct()
    {
        $this->db = Database::getInstance();
    }
}