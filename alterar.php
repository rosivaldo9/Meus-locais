<?php

include("processa.php");

$pessoa = selectIdPessoa($_POST["id"]);
//var_dump($pessoa);

?>

<meta charset="UTF-8">
    <!-- Inicio do formulario -->
      <form method="POST" action="processa.php">

      	<label>Nome:
        <input name="nome" type="text" id="nome" size="60" value="<?= $pessoa["nome"]?>" /></label><br />

        <label>Cep:
        <input name="cep" type="text" id="cep" size="10" maxlength="9" value="<?= $pessoa["cep"]?>" /></label><br />

        <label>Logradouro:
        <input name="logradouro"  type="text" id="logradouro" size="60" value="<?= $pessoa["logradouro"]?>"/></label><br />

        <label>Complemento
        <input name="rua" type="text" id="rua" size="60" value="<?= $pessoa["complemento"]?>"/></label><br />


        <label>Numero:
        <input name="numero" type="text" id="numero" size="60" value="<?= $pessoa["numero"]?>"/></label><br />

        <label>Bairro:
        <input name="bairro" type="" id="bairro"  value="<?= $pessoa["bairro"]?>"/></label><br />

        <label>Estado:
        <input name="uf" type="text" id="uf"  value="<?= $pessoa["uf"]?>"/></label><br />

         <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" value="<?= $pessoa["cidade"]?>"/></label><br />

         <label>Data:
        <input name="data" type="date" id="data" size="2" value="<?= $pessoa["data"]?>"/></label><br />

        <label>IBGE:
        <input name="ibge" type="text" id="ibge" size="8" value=""/></label><br />

                            
            
                <input type="hidden" name="acao" value="alterar">
                <input type="hidden" name="id" value="<?= $pessoa["id"]?>">
                <input type="submit" value="Enviar" name="Enviar">
        
      </form>