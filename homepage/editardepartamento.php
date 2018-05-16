<?php
/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = filter_input(INPUT_POST, 'T_titulo');

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
    
/* texto sql da consulta*/
$consulta = "UPDATE home SET titulo='$titulo' WHERE id='1' ";

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

