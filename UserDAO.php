<?php
/**
 *
 * This class is used to manage the user data.
 * Several methods for reading and writing user data to a text file are provided here.
 * All user data is stored in a text file in the /data folder.
 */
require_once("User.php");

class UserDAO
{
    /**
     * Custom sorting function. Used in usort().
     * @param $a        Value being compared.
     * @param $b        Value being compared.
     * @return bool     Result of comparison.
     */
    function sortData ($a, $b){
        return $a->beerFactor < $b->beerFactor;
    }
    /**
     * Reads all users saved in the file
     * @return array    An array of all the users in the file
     */
    function readUsers(){
        $userFile = fopen(USERFILE, "r") or die(DEBUG);
        $users = array();

        while(($line = fgets($userFile)) != false){
            $userData = explode(";", $line);
            $user = new User($userData[0],(int) $userData[1],(int) str_replace("\r\n", "", $userData[2]));
            array_push($users, $user);
        }
        fclose($userFile);

        usort($users, array($this, "sortData"));
        return $users;

    }

    /**
     * Adds a user to the file
     * @param $name     The name of the user that will be added
     */
    function addUser($name){
        $users = $this->readUsers();

        foreach ($users as $user){
            if ($user->getName() == $name) {
                echo "user exists";
                return;
            }
        }

        file_put_contents(USERFILE, $name.";0;0\r\n", FILE_APPEND);
    }

    /**
     * Deletes a user from the file
     * @param $name     The name of the user that will be deleted
     */
    function deleteUser($name){
        $users = $this->readUsers();
        foreach ($users as $user){
            if($user->getName() == $name){
                if(($userKey = array_search($user, $users)) !== false){
                    echo $userKey . " ";
                    unset($users[$userKey]);
                }
            }
        }

        $this->saveData($users, false);
    }

    /**
     * Increases the BeerConsumed of all users by 1
     * Increases the BeerPaid of the user that paid by 1
     * @param $name     The name of the user that paid the last round
     */
    function addRound($name){
        $users = $this->readUsers();
        foreach ($users as $user){
            if($user->getName() == $name){
                $user->setBeerPaid($user->getBeerPaid() + 1);
            }
            $user->setBeerConsumed($user->getBeerConsumed() + 1);
        }

        $this->saveData($users, false);
    }

    /**
     * Decreases the BeerConsumed of all users by 1
     * Decreases the BeerPaid of the user that paid by 1
     * @param $name     The name of the user that paid the last round
     */
    function deleteRound($name){
        $users = $this->readUsers();
        foreach ($users as $user){
            if($user->getName() == $name){
                $user->setBeerPaid($user->getBeerPaid() - 1);
            }
            $user->setBeerConsumed($user->getBeerConsumed() - 1);
        }

        $this->saveData($users, false);
    }

    /**
     * Saves all given users into the file.
     * Can append or overwrite
     * @param $users    An array of all the users that will be written to the file
     * @param $append   If the contents should be appended or if the file will be overwritten
     */
    function saveData($users, $append){
        $fileString = "";
        foreach ($users as $user){
            $fileString = $fileString . $user->getName() . ";" . $user->getBeerConsumed() . ";" . $user->getBeerPaid() . "\r\n";
        }
        if($append){
            file_put_contents(USERFILE, $fileString, FILE_APPEND);
        } else {
            file_put_contents(USERFILE, $fileString);
        }
    }


}


