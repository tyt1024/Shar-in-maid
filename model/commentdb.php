<?php
include("connect.php");

function insert_review(){
    //create info for users
    global $db;
    
    $query = "INSERT INTO reviews (text, user_id, serv_id) VALUES ('".$_POST['text']."', '".$_POST['serv_id']."', ".$_POST['user_id'].")";
    $result = $db->query($query);
}

function get_reviews(){
    //read info for users
    global $db;
    $query = "SELECT reviews.id, reviews.text, users.username,
                FROM messages
                LEFT JOIN users ON users.id = reviews.user_id,
                LEFT JOIN users ON serv.id = reviews.serv_id";
    
    $result = $db->query($query);
    
    echo json_encode($result->fetchAll());
    
}

function update_message(){
    //update info for user
    global $db;
    
    $query = "UPDATE reviews (text, user_id, serv_id) SET reviews ('".$_POST['text']."', '".$_POST['serv_id']."', ".$_POST['user_id'].")";
    $result = $db->query($query);
}

function delete_message(){
    //delete info for user
       global $db;
    $query = "DELETE FROM reviews WHERE comm_id = ".$_POST['comm_id']."";
    $result = $db->query($query);
    echo json_encode($result->fetchAll());
}

?>