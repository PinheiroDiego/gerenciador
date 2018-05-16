<?php
/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primeirotitulo = filter_input(INPUT_POST, 'T_primeirotitulo');
    $subtitulo = filter_input(INPUT_POST, 'T_subtitulo');
    $segundotitulo = filter_input(INPUT_POST, 'T_segundotitulo');
    $texto = filter_input(INPUT_POST, 'T_texto');

    /* validar os dados recebidos do formulario */
     if (empty($primeirotitulo) || empty($subtitulo) || empty($segundotitulo) || empty($texto)){
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
    
/* texto sql da consulta*/
$consulta = "UPDATE localizacao SET primeirotitulo='$primeirotitulo', subtitulo='$subtitulo', segundotitulo='$segundotitulo', texto='$texto'  WHERE id='1' ";

/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " ERRO - Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo "<script>alert('Atualizado com sucesso');window.location='../localizacao'</script>"; 



}
$ligacao->close();       /* fechar a ligação */

