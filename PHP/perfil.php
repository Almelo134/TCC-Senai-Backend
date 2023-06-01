<?php
//chama o arquivo de conexão com o bd
    require 'conexao/banco.php';
 
    if(isset($_POST['Alterar'])){
// declaração de variáveis
    $id = 1;
    $username = 'username';
    $email = 'email';
    $senha = 'senha';
    $confirSenha = 'confirSenha';

    $sql = mysql_query("UPDATE usuario SET username='$username', email='$email', senha='$senha', confirSenha='$confirSenha' WHERE id=$id");
        
    if(mysql_affected_rows() > 0){
      echo "Sucesso: Atualizado corretamente!";
        }else{
      die (mysqli_error());
    }
}
?>