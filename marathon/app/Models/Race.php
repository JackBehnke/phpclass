<?php

namespace App\Models;

use CodeIgniter\Model;
use mysql_xdevapi\Exception;

class Race extends Model
{
    public function get_races(){

        $this->session = service('session');
        $this->session->start();

        $memberKey = $this->session->get("memberKey");
        $db = db_connect();
        $sql = "select R.raceID, raceName, raceLocation, racedescription, raceDateTime from race R inner join member_race MR on R.raceID = MR.raceID inner join members ML on MR.memberID = ML.memberID where ML.memberKey = '$memberKey' and MR.roleID = '2'";
        $query = $db->query($sql);
        return $query->getResultArray();

    }
    public function get_race($id){

        $db = db_connect();
        $sql = "SELECT * FROM race WHERE raceID = ?";
        $query = $db->query($sql, [$id]);
        return $query->getResultArray();

    }
    public function add_race($name, $location, $description, $date){
        $this->session = service('session');
        $this->session->start();
        $memberID = $this->session->get("memberID");
        try{

            //insert My race
            $db = db_connect();
            $sql = "INSERT into race(raceName, raceLocation, racedescription, raceDateTime) values(?, ?, ?, ?)";
            $db->query($sql, [$name, $location, $description, $date]);
            //Get Auto ID
            $sql = "Select LAST_INSERT_ID()";
            $query = $db->query($sql);
            $row =$query->getResultArray();
            $LastID = $row[0]["LAST_INSERT_ID()"];
            //insert Into My Member_race table
            $sql = "INSERT into member_race(memberID, raceID, roleID) values(?, ?, 2)";
            $db->query($sql, [$memberID, $LastID]);


            return true;
        }catch(Exception $ex){
            return false;
        }
    }
    public function delete_race($id){
        try{
            $db = db_connect();
            $sql = "DELETE FROM race WHERE raceID = ?";
            $db->query($sql, [$id]);
            return true;
        }catch(Exception $ex){
            return false;
        }
    }
    public function update_race($name, $location, $description, $date, $txtID)
    {
        try{
            $db = db_connect();
            $sql = "UPDATE race SET raceName = ?, raceLocation = ?, racedescription = ?, raceDateTime = ? where raceID = ?";
            $db->query($sql, [$name, $location, $description, $date, $txtID]);
            return true;
        }catch(Exception $ex){
            return false;
        }
    }



}