<?php
/**
 * Created by PhpStorm.
 * User: zly
 * Date: 2019/7/17
 * Time: 22:33
 */
header("Content-type:text/json");


$flag=$error="";
if($_POST["username"]=="abc" && $_POST["password"]=="123"){
    $flag="y";
}
$res=array("flag"=>$flag);
echo json_encode($res);
