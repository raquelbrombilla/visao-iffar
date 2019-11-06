<?php
    include_once"conexaobanco.php";

        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
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
            $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
            if(array_search($extensao, $_UP['extensoes'])=== false){        
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Visao-IFFar/cadastro_usuarios.php'>
            <script type=\"text/javascript\"> 
            alert(\"A imagem não foi cadastrada extesão inválida.\");
            </script>";
            }

//Faz a verificação do tamanho do arquivo
            /*else if ($_UP['tamanho'] < $_FILES['foto']['size']){
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Visao_IFFAR/cadastro_usuarios.php'>
            <script type=\"text/javascript\">
            alert(\"Arquivo muito grande.\");
            </script>";
            }*/

 //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
            else{

//Primeiro verifica se deve trocar o nome do arquivo

            if($UP['renomeia'] == true){

//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg

            $nome_final = time().'.jpg';
            }else{

//mantem o nome original do arquivo
            $nome_final = $_FILES['foto']['name'];
            }
//Verificar se é possivel mover o arquivo para a pasta escolhida

            if(move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta']. $nome_final)){

//Upload efetuado com sucesso, exibe a mensagem

            $query = mysqli_query($conn, "INSERT INTO usuarios (foto) VALUES('$nome_final')");
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Visao-IFFar/login.php'>
            <script type=\"text/javascript\">
            alert(\"Imagem cadastrada com Sucesso.\");
            </script>"; 

            }else{
//Upload não efetuado com sucesso, exibe a mensagem
            echo "<META HTTP-EQUIV=REFRESH CONTENT = '0; URL=http://localhost/Visao-IFFar/login.php'>
            <script type=\"text/javascript\">
            alert(\"Imagem não foi cadastrada com Sucesso.\");
            </script>";
            }
            }

            
        $sql= "insert into usuarios(email,nome,senha,foto, admin) values('$email','$nome','$senha','$foto','0')";
        $return = mysqli_query($conexao,$sql);
    
        if($return){
        echo "Cadastro realizado com sucesso!";
        header("location:login.php");
        }else{
        echo "Não foi possivel cadastrar-se no banco, tente novamente ". PHP_EOL;
        echo "Debugging erro:". mysqli_connect_error().PHP_EOL;
        exit;
        }
    
        mysqli_close($conexao);
?>



