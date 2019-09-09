<?php

class DB {
    private $db;

    function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'mvc');
        if($this->db->connect_errno > 0){
            die('Unable to connect to database [' . $this->db->connect_error . ']');
        }
    }

    function register($name, $pwd, $city, $state, $phone) {
        $exist = $this->db->query("SELECT EXISTS(SELECT cust_name FROM customer WHERE cust_name = '{$name}');");
        if ($exist->current_field == 1) {
            return 1;
        }
        else{
            $this->db->query("INSERT INTO customer (cust_name, password, city, state, phone) VALUES ('{$name}', '{$pwd}', '{$city}', '{$state}', '{$phone}');");
            return 0;
        }
    }

    function login($name) {
        $exist = $this->db->query("SELECT EXISTS(SELECT cust_name FROM customer WHERE cust_name = '{$name}');");
        if ($exist == 1) {
            return $this->db->query("SELECT cust_id, password FROM customer WHERE cust_name = '{$name}';");
        }
        else {
            return 0;
        }
    }

    function getUserInfo($name) {
        return $this->db->query("SELECT cust_id, role FROM customer WHERE cust_name = '{$name}';");
    }

    function selectAll() {
        return $this->db->query("SELECT * FROM product;");
    }

    function addProduct($name, $price, $materials, $info) {
        $this->db->query("INSERT INTO product (product_name, product_price, `materials and environment`, `product info`) VALUES ('{$name}', $price, '{$materials}', '{$info}');");
    }

    function insertPayment($card, $name, $exp_date, $address, $state, $zip) {
        $this->db->query("INSERT INTO payment (card_No, name, exp_date, address, state, zip) VALUES ('{$card}', '{$name}', '{$exp_date}', '{$address}', '{$state}', '{$zip}');");
    }

    function lastInsertedId() {
        return $this->db->insert_id;
    }

    function insertOrdertable($date, $customer, $payment, $total) {
        $this->db->query("INSERT INTO ordertable (order_date, cust_id, payment_id, total_price) VALUES ('{$date}', {$customer}, {$payment}, {$total});");
    }

    function insertOrderline($order_id, $product_id, $qty) {
        $this->db->query("INSERT INTO orderline (order_id, product_id, quantity) VALUES ({$order_id}, {$product_id}, {$qty});");
    }
}