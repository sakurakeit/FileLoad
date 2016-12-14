<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 06.12.2016
 * Time: 13:35
 */
class Model_users extends Model
{
    public function getUserId($email)
    {
        $query = "SELECT * FROM tbl_user WHERE email=:email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $userId = $row['id'];
        }
        return $userId;
    }

    public function checkUser($email, $password)
    {
        $passwordMD5 =  md5($password);
        $query = "SELECT * FROM tbl_user WHERE email=:email AND password= :password ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordMD5);
        $stmt->execute();

        $dbEmail = '';
        $dbPassword = '';

        while ($row = $stmt->fetch()) {
            $dbEmail = $row['email'];
            $dbPassword = $row['password'];
        }

        if ($email == $dbEmail && $passwordMD5 == $dbPassword) {
            return true;
        } else {
            return false;
        }
    }
    public function insertUser($email, $password)
    {
        $passwordMD5 = md5($password);
        //$query = "SELECT * FROM tbl_user WHERE email=:email AND password= :password ";
        $query = "INSERT INTO tbl_user ( email, password) VALUES(:email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordMD5);
        $stmt->execute();
        return $stmt->rowCount();
    }
}