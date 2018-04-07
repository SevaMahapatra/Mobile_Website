<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce") or die(mysqli_error($con));

$email = mysqli_real_escape_string($con, $_POST['email']);
$password=  md5($_POST['password']);
$select_query = "SELECT user_id, email FROM user";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);
if (mysqli_num_rows($select_query_result) == 1)
{
    $insert_query = "INSERT into store.admin(email, password) values ($email, $password)";
}
else if (mysqli_num_rows($select_query_result) > 1)
{
    $insert_query = "INSERT into store.user(email, password) values ($email, $password)";
}
else 
{
    $users = 0;
}
//logic for authentication of admin
$email = mysqli_real_escape_string($con, $_POST['email']);
$select_query = "SELECT email FROM admin";
if($email == $select_query)
    header('location:index_admin.php');
else
    header('location:index.php');
?>
