<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 30.10.2018
 * Time: 15:48
 */

class UserDAO
{
    public $file = "data/users.txt";

    function readUsers(){
        $userFile = fopen($this->file, "r") or die("Adi suck Dick");
        $users = array();

        while(($line = fgets($userFile)) != false){
            //TODO: Create User object and add to array
        }
        echo fread($userFile, filesize($this->file));
        fclose($userFile);
    }

    function addUser(){

    }

    function deleteUser(){

    }
}

$userdao = new UserDAO();
$userdao->readUsers();