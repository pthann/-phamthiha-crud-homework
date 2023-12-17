<?php
require_once('database/database.php');
function validate_name($name)
{
    return ctype_alnum($name);
}

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validate_imageUrl($imageUrl)
{
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$imageUrl);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    $email = strip_tags($_POST['email']);
    $name = strip_tags($_POST['name']);
    $age = strip_tags($_POST['age']);
    $image_url = strip_tags($_POST['image_url']);
    $id = strip_tags($_POST['id']);
    
    if(validate_email($email) && validate_name($name) && validate_imageUrl($image_url))
    {
        $value = array("name"=>$name, "age"=>$age, "email"=>$email, "profile"=>$image_url, "id"=>$id);
        updateStudent($value);
        header("refresh:0.1;url=index.php");
    }else{
        echo "Error to create student!";
    }
endif;
?>
