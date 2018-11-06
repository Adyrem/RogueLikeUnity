<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 30.10.2018
 * Time: 15:48
 */
require_once("User.php");

class UserDAO
{
    public $file = "data/users.txt";

    function readUsers(){
        $userFile = fopen($this->file, "r") or die(DEBUG);
        $users = array();

        while(($line = fgets($userFile)) != false){
            //TODO: Create User object and add to array
            $userData = explode(";", $line);
            $user = new User($userData[0],$userData[1],$userData[2]);
            array_push($users, $user);
        }
        echo json_encode($users);
        fclose($userFile);
    }

    function addUser($name){

    }

    function deleteUser(){

    }
}

$userdao = new UserDAO();
$userdao->readUsers();