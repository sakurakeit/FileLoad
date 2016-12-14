<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 06.12.2016
 * Time: 5:37
 */
class Model_files extends Model
{
    public function getUserFiles($email)
    {
        $fileTable = [];
        $query = "SELECT * FROM tbl_files WHERE user_id = (select id from tbl_user where email=:email) order by date_load DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $fileTable[] = $row;
        }
        return $fileTable;
    }
    public function insertFile($fileName,$userId){
        $query =  "INSERT INTO tbl_files ( path, user_id) VALUES(:fileName,:userId)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':fileName', $fileName);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }
}