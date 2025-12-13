<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function has_access($raceID, $memberKey)
    {
        try
        {
            $db = db_connect();
            $sql = "select R.raceID from race R inner join member_race MR on R.raceID = MR.raceID inner join members ML on MR.memberID = ML.memberID where ML.memberKey = ? and MR.roleID = '2' and MR.raceID = ?;";
            $query = $db->query($sql, [$memberKey, $raceID]);
            $row = $query->getFirstRow();
            if($row == null){
                return false;
            }else{
                return true;
            }

        }catch(Exception $ex){
            return false;
        }


    }

    public function user_login($email, $passwd)
    {
        $db = db_connect();
        $sql = "SELECT * FROM members WHERE memberEmail = ? and roleID = 2";
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if ($row != null) {
            $hashedPassword = $row->memberPassword;
            $memberKey = $row->memberKey;
            $passwd = md5($passwd . $memberKey);
            if($hashedPassword == $passwd){
                $this->session = service('session');
                $this->session->start();

                $this->session->set("roleID", $row->roleID);
                $this->session->set("memberKey", $row->memberKey);
                $this->session->set("memberName", $row->memberName);
                $this->session->set("memberID", $row->memberID);

                return true;
            }else{
                return false;
            }



        }else {
            return false;
        }

    }

    public function create_user($username, $email, $pass)
    {
            $roleID = 1;
            $memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
            $hashedPassword = md5($pass . $memberKey);
            $db = db_connect();
            $sql = "INSERT INTO members (memberName, memberEmail, memberPassword, memberKey, roleID) VALUES (?, ?, ?, ?, ?);";
            $db->query($sql, [$username, $email, $hashedPassword, $memberKey, $roleID]);
            return true;
    }

}