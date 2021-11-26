<?php
require_once "./Model/customer.php";
class member extends customer{
    public function get_product_in_cart($id){
        $query =    "SELECT `product`.`ID` AS `id`,
                            `product`.`NAME` AS `name`, 
                            `product`.`PRICE` AS `price`,
                            `product`.`IMG_URL` AS `img`,
                            `product_in_cart`.`QUANTITY` AS `num`,
                            `product_in_cart`.`SIZE` AS `size`,
                            `product_in_cart`.`OID` AS `oid`
                    FROM `cart`, `product_in_cart`, `product`, `account`
                    WHERE `cart`.`ID` = `product_in_cart`.`OID`
                        AND `cart`.`STATE` = 0
                        AND `product`.`ID` = `product_in_cart`.`PID`
                        AND `account`.`ID` = " . $id . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_in_cart_mem($id){
        $query =    "SELECT `product`.`ID` AS `id`,
                            `product`.`NAME` AS `name`, 
                            `product`.`PRICE` AS `price`,
                            `product`.`IMG_URL` AS `img`,
                            `product_in_cart`.`QUANTITY` AS `num`,
                            `product_in_cart`.`SIZE` AS `size`
                    FROM `cart`, `product_in_cart`, `product`, `account`
                    WHERE `cart`.`ID` = `product_in_cart`.`OID`
                        AND `product`.`ID` = `product_in_cart`.`PID`
                        AND `cart`.`UID` = `account`.`ID`
                        AND `cart`.`ID` = " . $id . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_user($id){
        $query =    "SELECT `account`.`FNAME` AS `name`,
                            `account`.`PHONE` AS `phone`, 
                            `account`.`ADDRESS` AS `add`, 
                            `account`.`USERNAME` AS `username`, 
                            `account`.`IMG_URL` AS `img`, 
                            `account`.`CMND` AS `cmnd`, 
                            `account`.`PWD` AS `pwd`
                    FROM    `account`
                    WHERE   `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function update_user($id, $fname, $phone, $add){
        $query =    "UPDATE `account`
                    SET `account`.`FNAME` = \"" . $fname . "\", `account`.`PHONE` = \"" . $phone ."\", `account`.`ADDRESS` = \"" . $add . "\"
                    WHERE `account`.`ID` = " . $id .";";
        return mysqli_query($this->connect, $query);
    }
    public function delete_product_incart($id){
        $query =    "DELETE FROM `product_in_cart` WHERE `product_in_cart`.`ID` = " . $id .";";
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `cart` 
                    WHERE `cart`.`ID` NOT IN (  SELECT `cart`.`ID` FROM `product_in_cart`, `cart`
                                                WHERE `product_in_cart`.`OID` = `cart`.`ID`
                                                GROUP BY `cart`.`ID`)";
        return mysqli_query($this->connect, $query);
    }
    public function update_product_in_cart($id, $quantity, $size){
        if($quantity == 0){
            $this->delete_product_incart($id);
        }
        else{
            $query =    "UPDATE `product_in_cart`
                        SET `product_in_cart`.`QUANTITY` = " . $quantity . ", `product_in_cart`.`SIZE` = \"" . $size ."\"
                        WHERE `product_in_cart`.`ID` = " . $id;
            return  mysqli_query($this->connect, $query);
        }
    }
    public function update_cart($id){
        $query =    "UPDATE `cart`
                    SET `cart`.`STATE` = 1
                    WHERE `cart`.`ID` = " . $id;
        return  mysqli_query($this->connect, $query);
    } 
    public function get_cart($id){
        $query =    "SELECT     `cart`.`ID` AS `id`,   
                                `cart`.`TIME` AS `time`, 
                                `cart`.`STATE` AS `state`
                    FROM `cart`, `account`
                    WHERE `cart`.`UID` = " . $id ."
                    GROUP BY `cart`.`ID`";
        return  mysqli_query($this->connect, $query);
    }
    public function update_profile_nope_img($id, $fname, $user, $pwd, $cmnd, $phone, $add){
        $query =    "UPDATE `account`
                    SET `account`.`CMND` = \"" . $cmnd . "\",
                        `account`.`FNAME` = \"" . $fname . "\",
                        `account`.`PHONE` = \"" . $phone . "\",
                        `account`.`ADDRESS` = \"" . $add . "\",
                        `account`.`USERNAME` = \"" . $user . "\",
                        `account`.`PWD` = \"" . $pwd . "\"
                    WHERE `account`.`ID` = " . $id ;
        return mysqli_query($this->connect, $query);
    }
    public function get_cart_for_session(){
        $query =    "SELECT MAX(`cart`.`ID`) AS `id` FROM `cart`" ;
        return mysqli_query($this->connect, $query);
    }
    public function create_cart($id, $time){
        $query =    "INSERT INTO `cart` (`cart`.`UID`, `cart`.`TIME`)
                    VALUES(" . $id . ", \"" . $time . "\");";
        return mysqli_query($this->connect, $query);
    }
    public function create_product_incart($pid, $oid, $quantity){
        $query =    "INSERT INTO `product_in_cart`(`product_in_cart`.`PID`, `product_in_cart`.`OID`, `product_in_cart`.`QUANTITY`)
                    VALUES (" . $pid . ", " . $oid . ", " . $quantity . ");";
        return mysqli_query($this->connect, $query);
    }
    public function update_pic($path){
        $query =    "UPDATE `account`
                    SET `account`.`IMG_URL` = \"" . $path . "\"
                    WHERE `account`.`ID` = " . $id ;
        return mysqli_query($this->connect, $query);
    }
}
?>