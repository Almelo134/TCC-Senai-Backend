<?php

    require "conexao/banco.php";
    $minSenha = 8;

    if(isset($_POST['Registrar'])){

        $username = $_POST['username'];
        $email = $_POST ['email'];
        $senha = $_POST['senha'];
        $confirSenha = $_POST['confirSenha'];

        $criptSenha = password_hash($senha, PASSWORD_DEFAULT);
        $criptConfirSenha = password_hash($confirSenha, PASSWORD_DEFAULT);

        if(empty($username) || empty($email) || empty($criptSenha) || empty($criptConfirSenha)){
            print'<script>alert("Confira se todos os campos estão preenchidos corretamente");</script>';
            print'<script>location.href="../register.php";</script>';
        }
        elseif( strlen($senha) < $minSenha || strlen($confirSenha) < $minSenha){

            print'<script>alert("As senhas devem ter no mínimo 8 caracteres");</script>';
            print'<script>location.href="../register.php";</script>';
        } 
        elseif($senha != $confirSenha){
            print'<script>alert("As senhas devem ser iguais");</script>';
            print'<script>location.href="../register.php";</script>';

        }
        else{

            $sql = "INSERT INTO usuario(username, email, senha, confirSenha) VALUES ('$username', '$email','$criptSenha','$criptConfirSenha')";

            $result = mysqli_query($conn, $sql);
            
            print'<script>alert("Usuário cadastrado com sucesso! Redirecionando para a página inicial");</script>';

            print'<script>location.href="../index.php";</script>';

        } 
            

}
        
      