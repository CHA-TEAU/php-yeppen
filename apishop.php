<?php

include "dbconnect.php";

$json = json_decode(file_get_contents("php://input"), true);
switch ($json['action']){
    case "reg":
        $login = $json['payload']['login'];
        $role = $json['payload']['role'];
        $pass = $json['payload']['pass'];
        
        $db = DB :: dbconn();
        $query = $db -> query("INSERT INTO `users`(`id`, `login`, `pass`, `role`) VALUES (NULL,'$login','$pass','$role')");

        if($query){

            echo json_encode([
                "status"=>"ok",
            ]);
        }

        break;

}