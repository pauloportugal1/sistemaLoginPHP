<?php
     require_once 'classeUsuario.php';
    $u = new Usuario;

    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confSenha = addslashes($_POST['confSenha']);
        
        //verificar se há campos vazios
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha)
        && !empty($confSenha))
        {
            $u->conectar("cadastro", "localhost","root","");

            if($u->msgErro == "")//sem erros
            {
                if($senha == $confSenha)
                {
                    if($u->cadastrar($nome, $telefone, $email, $senha))
                    {
                        echo "Cadastrado(a) com sucesso!";
                    }
                    else
                    {
                        echo "Email já cadastrado!";
                    }
                }
                else
                {
                    echo "Senha incorreta para confirmação!";
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

