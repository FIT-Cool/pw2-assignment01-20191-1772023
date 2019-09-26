<?php
$submitted = filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)) {
    $username = filter_input(INPUT_POST, 'txtUsername');
    $password = filter_input(INPUT_POST, 'txtPassword');
    $user = login($username,$password);
    if($user!=null && $user['username'] == $username){
        $_SESSION['user_logged']=true;
        $_SESSION['name']=$user['name'];
        header("location:index.php");
    }else{
        $errMsg = "Invalid Username or Password";
    }
}
if (isset($errMsg)){
    echo $errMsg;
}
?>

<form method="post">
    <p>LOGIN</p>
    Username :<input type="text" name="txtUsername" id="name">
    Password :<input type="password" name="txtPassword" id="name">
    <input name="btnSubmit" type="submit" value="login">
</form>
