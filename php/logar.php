<?php

require_once 'classeUsuario.php';
    $u = new Usuario;

    if(isset($_POST['email']))
    {  
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
      
        
        //verificar se há campos vazios
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("cadastro", "localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($email,$senha))
                {
                    header("location: ambientePrivado.php");
                }
                else
                {
                    echo "Email e/ou senha estão incorretos!";
                }
            }
            else
            {
                echo "Erro: ".$u->msgErro;
            }
        }
        else
        {
            echo "Preencha todos os campos!";
        }
          
        }
        