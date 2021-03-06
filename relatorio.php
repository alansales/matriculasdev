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
  </head>
  <body>
  <h1>Relatório de Matrículas</h1> 
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
      <li><a href="adm.php">Administração</a></li>
	  <li><a href="sair.php">Sair</a></li>
    </ul>
  </div>
</div>
<?php
// inicio ronaldo
//requerer objeto consultaData
require_once('config/consultaData.php');
$c = new consultarData();

$mes='02';

?>
<table border="1">
<tr>
   <td><b>Data</b></td>
   <td><b>Quantidade</b></td>
</tr>
<?php
//print 'Consultar matriculas do Mês de Fevereiro';
$dados = mysql_query($c->porMes($mes));

//listar das matriculas de fevereiro
//print 'Data';
while($linha = mysql_fetch_assoc($dados)) {
?>
<tr>
	<td><?php print $linha['data'] ?></td>
	<td><?php print $linha['quantidade'] ?></td>
</tr>

<?php
//print 'Somar a quantde dos registros do mes';
$soma = mysql_query($c->somarQtdePorMes($mes));
print $soma;

//print 'Retornar em string o mes selecionado';
$data = mysql_query($c->retornarData($mes));
print $c->strMes($data);
}
//fim ronaldo
?>
</table>
  </body>
</html>