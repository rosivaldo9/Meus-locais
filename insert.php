

<script language="javascript" type="text/javascript">


function validar() {

var cep = formaCadastro.cep.value;
if (cep == "") {
alert('Favor informar o CEP para a consulta');


form1.nome.focus();
return false;


}
}




    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouro').value=("");
            document.getElementById('complemento').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('complemento').value=(conteudo.complemento);
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
                document.getElementById('logradouro').value="...";
                document.getElementById('complemento').value=("...");
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


</script>

<meta charset="UTF-8">
    <!-- Inicio do formulario -->
      <form name="formaCadastro" method="POST" action="processa.php">

      	<label>Nome:
        <input name="nome" type="text" id="nome" size="60" /></label><br />

        <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />

        <label>Logradouro:
        <input name="logradouro" type="text" id="logradouro" size="60" /></label><br />

        <label>Complemento
        <input name="complemento" type="text" id="complemento" size="60" /></label><br />


        <label>Numero:
        <input name="numero" type="text" id="numero" size="60" /></label><br />

        <label>Bairro:
        <input name="bairro" type="" id="bairro"  /></label><br />

        <label>Estado:
        <input name="uf" type="text" id="uf"  /></label><br />

         <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />

         <label>Data:
        <input name="data" type="date" id="data" size="2" /></label><br />

        <label>IBGE:
        <input name="ibge" type="text" id="ibge" size="8" /></label><br />

         <input type="hidden" name="acao" value="inserir" >
        <input id="rt" class="corBotaoEnviar" type="submit" value="Cadastrar" name="enviar" onclick="return validar()">
      </form>

