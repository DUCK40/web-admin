<?php
session_start();
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

// echo $username . "<br>";
// echo $password. "<br>";

echo __MAIN__($username, $password);

function __MAIN__($username, $password)
{
    return check_login($username, $password);
}

function check_login($username, $password)
{
    if ($username == 'sutida' && $password == 'panrodcrm01') {
        $_SESSION['name']='sutida';
        $_SESSION['department']='CRM';
        header("location: ./registervendor.php");

    } else if ($username == 'sasitida' && $password == 'seetasancrm02') {
        $_SESSION['name']='sasitida';
        $_SESSION['department']='CRM';
        header("location: ./registervendor.php");

    } else if ($username == 'paphassara' && $password == 'phumketcrm03') {
        $_SESSION['name']='paphassara';
        $_SESSION['department']='CRM';
        header("location: ./registervendor.php");

    } else if ($username == 'janyarat' && $password == 'muangpruancrm04') {
        $_SESSION['name']='janyarat';
        $_SESSION['department']='CRM';
        header("location: ./registervendor.php");

    } else if ($username == 'jariyakorn' && $password == 'karooncrm05') {
        $_SESSION['name']='jariyakorn';
        $_SESSION['department']='CRM';
        header("location: ./registervendor.php");

    } else if ($username == 'natee' && $password == 'sukdeesrisawasdicrm06') {
        $_SESSION['name']='natee';
        $_SESSION['department']='CRM';
        header("location: ./registervendor.php");

    } else if ($username == 'superadmin' && $password == 'superman') {
        $_SESSION['name']='Super Admin';
        $_SESSION['department']='Dev';
        header("location: ./registervendor.php");

    } else if ($username == 'ilada' && $password == 'senngambd01') {
        $_SESSION['name']='ilada';
        $_SESSION['department']='BD';
        header("location: ./registervendor.php");

    } else if ($username == 'chalermsak' && $password == 'sukdeebd02') {
        $_SESSION['name']='chalermsak';
        $_SESSION['department']='BD';
        header("location: ./registervendor.php");

    } else if ($username == 'operation' && $password == 'operation01') {
        $_SESSION['name']='operation';
        $_SESSION['department']='Operation Manager';
        header("location: ./registervendor.php");

    } else {
        header("location: ./login.php");
    }
}
