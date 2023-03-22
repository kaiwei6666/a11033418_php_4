<?php
session_start();
$accounts=array(
    "teacher => 123",
    "principal => 456",
    "student => 789",
);
if(isset($_POST["name"]) && isset($_POST["password"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    if(isset($accounts[$name]) && $accounts[$name] === $password) {
        $_SESSION["role"] = $name;
    } else {
        echo"帳號或密碼錯誤";
    }
}
if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    if ($role === "principal") {
        include "teacher_page.php";
    } else if ($role === "teacher") {
        include "student_page.php";
    } else if ($role === "student") {
        include "student_page.php";
    }
}
?>