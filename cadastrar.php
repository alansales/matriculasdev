<?php
// Incluindo arquivo de conexão/configuração
require_once('config/conn.php');

// Instanciando novo objeto da classe Login
$objLogin = new Login();

// Verificando se o usuário está logado, caso contrá será redirecionado para a página de login
if (!$objLogin->verificar('index.html'))
    // Finalizado o script, apenas para garantir que o usuário irá ver o conteúdo da página
    exit;

// Selecionando informações do usuário
$query = mysql_query("SELECT * FROM usuario WHERE usuario_id = {$objLogin->getID()}");
$usuario = mysql_fetch_object($query);

include "config/conn2.php";

$acao = $_GET["acao"];

if ($acao == "cadastro") {

$data = $_POST["data"];
$quantidade = $_POST["quantidade"];
$tipo = $_POST["tipo"];

// Caso não haja nenhum erro
if (sizeof($error) == 0) {

$sql = mysql_query("INSERT INTO matriculas VALUES ('', '$data', '$quantidade', '$tipo')");

if ($sql) {
	echo "<script language='javascript'>alert('Cadastro efetuado com sucesso')</script>";
} else {
	echo "<script language='javascript'>alert('Não foi possivel realizar o cadastro no momento')</script>";
}
}
}
?>

<!DOCTYPE HTML>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Metas de Matrículas</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Incluindo o jQuery que é requisito do JavaScript do Bootstrap localmente-->
		<script src="js/bootstrap.min.js"></script>
<script>
$(function() {
    $("#calendario").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
    });
});
</script>
<script type="text/javascript">
        // Quando carregado a página
        $(function($) {

            // Quando enviado o formulário
            $('#frm').submit(function() {

                // Limpando mensagem de erro
                $('div.mensagem-erro').html('');

                // Mostrando loader
                $('div.loader').show();

                // Enviando informações do formulário via AJAX
                $(this).ajaxSubmit(function(resposta) {

                    // Se não retornado nenhum erro
                    if (!resposta)
                        // Redirecionando para o painel
                        window.location.href = 'painel.php';
                    else
                    {
                        // Encondendo loader
                        $('div.loader').hide();

                        // Exibimos a mensagem de erro
                        $('div.mensagem-erro').html(resposta);
                    }

                });

                // Retornando false para que o formulário não envie as informações da forma convencional
                return false;

            });
        });
</script>
  </head>
  <body>
  <h1>Cadastro de Matrículas</h1> 
        <ul>
            <!--<li><strong>ID:</strong> <?php echo $objLogin->getID() ?></li>-->
            <li><strong>Bem Vindo: </strong> <?php echo $objLogin->getLogin() ?></li>
        </ul>  
		<!--<p>Bem vindo <strong><?php echo $usuario->nome; ?></strong></p>-->
	
    <div class="navbar">
  <div class="navbar-inner">
    <!--<a class="brand" href="#">Título</a>-->
    <ul class="nav">
      <li class="active"><a href="cadastrar.php">Cadastro</a></li>
      <li><a href="relatorio.php">Relatórios</a></li>
      <li><a href="#">Administração</a></li>
	  <li><a href="sair.php">Sair</a></li>
    </ul>
  </div>
</div>
  <?php
// Caso haja erros
if (sizeof($error) != 0) {
	// Exibe os erros
	foreach ($error as $err) {
		echo "<font color='red'><b>" .$err . "</b></font><br />";
	}
}
?>
<form id="frm" method="post" action="cadastrar.php?acao=cadastro">
<p><strong>Data:</strong><br />
	<input name="data" type="text" id="calendario" value="<?php if (sizeof($error) != 0) { echo $data; } ?>" />
</p>
<p><strong>Quantidade:</strong><br />
	<input name="quantidade" type="text" id="quantidade" value="<?php if (sizeof($error) != 0) { echo $quantidade; } ?>" />
</p>
<p>	<input type="submit" value="Cadastrar" /></p>
</form>
  </body>
</html>