<?php

if(isset($_POST["acao"])){

if($_POST["acao"]=="inserir"){
	inserirPessoa();
}
if($_POST["acao"]=="alterar"){
	alterarPessoa();
}
if($_POST["acao"]=="excluir"){
	excluirPessoa();
}

}
function abrirBanco(){
	$conexao = new mysqli("localhost", "root", "", "meus locais");
	return $conexao;
}

function voltarIndex(){
	header("Location:index.php");
}

function inserirPessoa(){
	$nome =$_POST["nome"];
	$cep=$_POST["cep"];
	$logradouro = $_POST["logradouro"];
	$complemento = $_POST["rua"];
	$numero = $_POST["numero"];
   $bairro =$_POST["bairro"];
	$uf=$_POST["uf"];
	$cidade = $_POST["cidade"];
	$data = $_POST["data"];


	$banco = abrirBanco();

	$sql = "INSERT INTO locais( nome, cep, logradouro,  complemento,numero, bairro, uf, cidade, data) VALUES (
	'$nome',
	'$cep',
	'$logradouro',
	'$complemento',
	'$numero',
	' $bairro',
	'$uf',
	'$cidade',
	'$data'
	)";

	$banco -> query($sql);
	$banco -> close();
	voltarIndex();
}

function alterarPessoa(){
	$id =$_POST["id"];
	$nome =$_POST["nome"];
	$cep=$_POST["cep"];
	$logradouro = $_POST["logradouro"];
	$complemento = $_POST["rua"];
	$numero = $_POST["numero"];
   $bairro =$_POST["bairro"];
	$uf=$_POST["uf"];
	$cidade = $_POST["cidade"];
	$data = $_POST["data"];


	$banco = abrirBanco();

	$sql = "UPDATE locais SET nome='$nome', cep='$cep', logradouro='$logradouro',  complemento='$complemento',numero='$numero', bairro=' $bairro', uf='$uf', cidade='	$cidade', data='$data' where id='$id' ";

	$banco -> query($sql);
	$banco -> close();
	voltarIndex();
}


function selectAllPessoa(){

	$banco = abrirBanco();

	$sql = "SELECT * FROM locais ORDER BY nome";
	$resultado = $banco -> query($sql);
	while ($row = mysqli_fetch_array($resultado)) {
		$grupo[] = $row;
	}
	return $grupo;
}




function selectIdPessoa($id){

	$banco = abrirBanco();

	$sql = "SELECT * FROM locais where id =".$id;
	$resultado = $banco -> query($sql);
   $pessoa = mysqli_fetch_assoc($resultado);
	
	return $pessoa;
}


function excluirPessoa(){
	$id=$_POST["id"];


	$banco = abrirBanco();

	$sql = "DELETE FROM locais WHERE id ='$id'";

	$banco -> query($sql);
	$banco -> close();
	voltarIndex();
}





?>