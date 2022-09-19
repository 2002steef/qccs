<?php

class userActions
{

    public $conn;

//$dbhost = 'localhost', $dbuser = 'relatebeheer', $dbpass = 'Z1HaCog5gh6d%efu', $dbname = 'relatebeheer', $charset = 'utf8'

    public function __construct() {
        $this->conn = new mysqli("localhost","relatebeheer","Z1HaCog5gh6d%efu","relatebeheer");
//        global $mysqli;
//        $this->conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//        if ($this->conn->connect_error) {
//            $this->error('Failed to connect to MySQL - ' . $this->conn->connect_error);
//        }
//        $this->connection->set_charset($charset);
//        return $this->link;
    }

    function registerUsersP($first_name, $last_name_prefix, $last_name, $street, $housenumber, $postalcode, $phoneNumber, $email, $customer_of){
        $query = $this->conn->prepare("INSERT INTO `customers_individual`(`first_name`,`last_name_prefix`, `last_name`, `street`,
                                   `housenumber`,
                                   `postalcode`, `phoneNumber`,email,customer_of) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->bind_param("ssssssssi", $first_name, $last_name_prefix, $last_name, $street, $housenumber, $postalcode, $phoneNumber, $email, $customer_of);
        $query->execute();
    }
    function registerUsersZ($first_name, $last_name_prefix, $last_name, $street, $housenumber, $postalcode, $phoneNumber, $email, $business, $customer_of){
        $query = $this->conn->prepare("INSERT INTO `customers_business`(`first_name`,`last_name_prefix`,`last_name`,`street`,
                                 `housenumber`,`postalcode`,`phoneNumber`,
                                 `email`,`business`,`customer_of`)VALUES(?,?,?,?,?,?,?,?,?,?)");
        $query->bind_param("sssssssssi", $first_name, $last_name_prefix, $last_name, $street, $housenumber, $postalcode, $phoneNumber, $email, $business, $customer_of);
        $query->execute();
    }
}




