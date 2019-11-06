<?php
    include_once"conexaobanco.php";

        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $foto = $_FILES['foto']['name'];

//Foto perfil usuario
    $_UP['pasta'] = 'fotos/';
    //$_UP['tamanho'] = 1024 -1024-100;
    $_UP['extensao'] = array('png','jpg','jpeg','gif');

    $_UP['renomeia'] = true;
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'A foto no upload é maior que o limite do PHP';
    $_UP['erros'][2] = 'A foto ultrapassa o limite de tamanho especificado no HTML';
    $_UP['erros'][3] = 'A foto foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload da foto';
            
//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
            if($_FILES['foto']['error'] != 0){
            die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['foto']['error']]);
            exit; //Para a execução do script
            }

//Faz a verificação da extensao do arquivo
            $exp = explode('.', $foto);
            $extensao = strtolower(end($exp));
            if(array_search($extensao, $_UP['extensao'])=== false){        
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Visao-IFFar/perfil.php'>
            <script type=\"text/javascript\"> 
            alert(\"A imagem não foi cadastrada extesão inválida.\");
            </script>";
            }

 //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
            else{

//Primeiro verifica se deve trocar o nome do arquivo

            if($_UP['renomeia'] == true){

//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg

            $nome_final = time().'.jpg';
            }else{

//mantem o nome original do arquivo
            $nome_final = $_FILES['foto']['name'];
            }
//Verificar se é possivel mover o arquivo para a pasta escolhida

            if(move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta']. $nome_final)){

//Upload efetuado com sucesso, exibe a mensagem

                  
        $sql= " update usuarios set email = '$email', nome = '$nome' ,foto = '$nome_final' where id_usuario = " .$_POST['id'];
       
        if($return = mysqli_query($conexao,$sql)){
        	
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Visao-IFFar/perfil.php'>
            <script type=\"text/javascript\">
            alert(\"Perfil atualizado com sucesso.\");
            </script>";

            }else{
//Upload não efetuado com sucesso, exibe a mensagem
            
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/Visao-IFFar/perfil.php'>
            <script type=\"text/javascript\">
            alert(\"Não foi possivel atualizar o perfil.\");
            </script>";
            }
            }

           }



