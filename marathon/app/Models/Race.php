<?php

namespace App\Models;

use CodeIgniter\Model;
use mysql_xdevapi\Exception;

class Race extends Model
{
    public function get_races(){

        $db = db_connect();
        $sql = "SELECT * FROM race";
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
        try{
            $db = db_connect();
            $sql = "INSERT into race(raceName, raceLocation, racedescription, raceDateTime) values(?, ?, ?, ?)";
            $db->query($sql, [$name, $location, $description, $date]);
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