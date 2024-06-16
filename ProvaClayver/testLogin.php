<?php
session_start();
//print_r($_REQUEST);
if(isset($_POST['submit']) && !empty($_POST['email'])
&& !empty($_POST['senha'])){
    //deixa acessar o sistema
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    /*print_r('Email: '.$email);
    print_r('<br>');
    print_r('Senha: '.$senha);*/
    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
    #verifica se a senha e email é igual ao do banco de dados
    $result = $conexao->query($sql); #manda executar no banco de dados
    //print_r($result);
    //print_r($sql);
    if(mysqli_num_rows($result) < 1){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('login.php');
    }else{
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: sistema.php');
    }
}
else{
    //não deixa acessar
    header('Location: login.php');
}
?>