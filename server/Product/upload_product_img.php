<?php
/**
 * Created by PhpStorm.
 * User: Gitau.dev
 * Date: 21/09/2018
 * Time: 17:11
 */
require_once '../../db_functions.php';
$db = new DB_Functions();

if(isset($_FILES["uploaded_file"]["name"]))
{
    $name = $_FILES["uploaded_file"]["name"];
    $tmp_name = $_FILES["uploaded_file"]["tmp_name"];
    $error = $_FILES["uploaded_file"]["error"];

    if(!empty($name))
    {
        $location = './product_img/';
        if(!is_dir($location))
            mkdir($location);
        if(move_uploaded_file($tmp_name, $location.$name))
        {
            echo json_encode($name);

        }
        else
            echo json_encode("Upload failed ! Move Location error ");
    }
}
else
    echo json_encode("Please Select file !");
