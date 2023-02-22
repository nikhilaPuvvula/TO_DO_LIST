<?php
function make_connection()
{
  $host="localhost";
  $username="root";
  $password="";
  $db="toDoList";
  $con = new mysqli($host,$username,$password,$db);
  if($con->connect_error)
  {
    echo "there is some connection error".$con->connect_error;
  }
  return $con;
}

function add_items($value)
{
    $con=make_connection();
    $query="INSERT INTO `to_do` (`id`, `item`, `status`) VALUES (NULL, '$value', '0')";
    $con->query($query);
}

function update_items($id)
{
    $con=make_connection();
    $query="UPDATE `to_do` SET `status` = '1' WHERE `to_do`.`id` = '$id';";
    $con->query($query);
}

function delete_items($id)
{
    $con=make_connection();
    $query="DELETE FROM `to_do` WHERE `to_do`.`id` = '$id';";
    $con->query($query);
}

function get_items()
{
   $con=make_connection();
   $query="SELECT id,item FROM `to_do` WHERE status='0';";
   $result=$con->query($query);
    return $result;
}

function get_items_checked()
{
   $con=make_connection();
   $query="SELECT id,item FROM `to_do` WHERE status='1';";
   $result=$con->query($query);
    return $result;
}

?>