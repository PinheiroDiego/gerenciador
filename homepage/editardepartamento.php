<?php

     $conexao = mysqli_connect("127.0.0.1", "root", "", "erich");
      mysqli_set_charset($conexao, 'utf8');
     $dados = mysqli_query($conexao,  "SELECT * FROM home WHERE id = 1");

     while ($home = mysqli_fetch_array($dados)):
        /* adicionei a conexão pra ver se pegava o id */
   
/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = filter_input(INPUT_POST, 'T_titulo');
    $id = $_POST["id"];

    /* validar os dados recebidos do formulario */
    if (empty($titulo)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
   echo " ERRO - Não foi possível executar a operação editar. ";
   exit();
}

/* estabelece a ligação à base de dados */
$ligacao = new mysqli("localhost", "root", "", "erich");

/* verifica se ocorreu algum erro na ligação */
if ($ligacao->connect_errno) {
    echo "Falha na ligação: " . $ligacao->connect_error; 
    exit();
}
    
if(isset($_FILES["InputFile"])){
    $file               = $_FILES["InputFile"]["name"];
    $file_tmp           = $_FILES["InputFile"]["tmp_name"];
    $tamanho            = $_FILES["InputFile"]["size"];
    $tipo               = $_FILES["InputFile"]["type"];
    
    /*
    aqui pega extensao do arquvo
    */
    $ext                = pathinfo($file, PATHINFO_EXTENSION);
    
    /*
    coloca o caminho da pasta
    */      
    

    /*
    cria um nome unico pro arquivo
    */      
     /*
mudei aqui mas n pegou o id tbm    */      
    $nome = 'home'.''.id;
    
    /*
    coloca o caminho da pasta
    */      
    $pasta          = "../plugins/images/";
    
    /*
    faz upload na pasta e ja faz um insert no banco embaixo pra colcoar esse nome no banco, numa tabela de imagem
    */      
    move_uploaded_file($file_tmp, $pasta.$nome.'.'.$ext); 






/* texto sql da consulta*/
$consulta = "UPDATE home SET titulo='$titulo', anexo_id='$nome.$ext' WHERE id='1' ";

/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " ERRO - Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo "<script>alert('Atualizado com sucesso');window.location='../homepage'</script>"; 



}
$ligacao->close();       /* fechar a ligação */

}
endwhile; ?>
