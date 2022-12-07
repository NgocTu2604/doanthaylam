<?php
include '../model/User.php';
session_start();

if ($_POST['btn_action'] == 'Register') {
    if ($_POST['login_txt_username'] == "" && $_POST['login_txt_password'] == "")
        header("Location: http://localhost/web/lam_n/20102022/login.php");
    else {
        $user = new User($_POST['login_txt_username'], md5($_POST['login_txt_password']));
        $user->insertUser();
    }
}

if ($_POST['btn_action'] == 'Login') {
    $username = $_POST['login_txt_username'];
    $password = $_POST["login_txt_password"];
    $user = new User("", "");
    $data = $user->getUsers($username);
    

    if ($username == $data['username'] && md5($password) == $data['password']) {
        $_SESSION["is_user"]=true;
        $_SESSION["username"]=$_POST['login_txt_username'];
        header("Location: http://localhost/web/lam_n/20102022/product.php");
        // echo  $username . " da nhap thanh cong";
    } else if ($_POST['login_txt_username'] == "" && $_POST['login_txt_password'] == "") {
        echo "rong";
    } else {
        // echo "aaaaaaaa";
        header("Location: http://localhost/web/lam_n/20102022/login.php");
    }
}
