    
<?php  
include("processa.php");
$grupo = selectAllPessoa();
?>

    <html>
    <head>
    <title>ViaCEP Webservice</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Adicionando Javascript -->
    <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

function uf($uf){
    if($uf == "MG"){
  var element = document.getElementById("uff");
  element.classList.add("ufMG");
    }
}


    </script>
    </head>

    <body>




<h1 align="center">Lista de locais que gostaria de visitar</h1>

<a href="insert.php">Cadastrar</a>

<table border="5px">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        foreach ($grupo as $pessoa) {?>
        
        <tr id="uff" onload="uf(<?=$pessoa['uf']?>)">
            <td><?=$pessoa["nome"]?></td>
            <td><?=$pessoa["data"]?></td>
            <td>
                
                <form name="alterar" action="alterar.php" method="POST">

                    <input type="hidden" name="id" value=<?=$pessoa["id"]?> />
                    <input type="submit" name="editar" value="Editar">

                    
                </form>
            </td>
            <td> 
                <form name="excluir" action="processa.php" method="POST">

                    <input type="hidden" name="id" value=<?=$pessoa["id"]?> />
                    <input type="hidden" name="acao" value="excluir">
                    <input type="submit" name="excluir" value="Excluir">

                    
                </form>
            </td>
        </tr>


        <?php   
        }
        ?>
    </tbody>

</table>






    </body>


    </html>