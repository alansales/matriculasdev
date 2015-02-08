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
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
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
  <h1>Metas de Matrículas</h1>        
		<!--<p>Bem vindo <strong><?php echo $usuario->nome; ?></strong></p>-->
        <ul>
            <!--<li><strong>ID:</strong> <?php echo $objLogin->getID() ?></li>-->
            <li><strong>Bem Vindo: </strong> <?php echo $objLogin->getLogin() ?></li>
        </ul>
    <div class="navbar">
  <div class="navbar-inner">
    <!--<a class="brand" href="#">Título</a>-->
    <ul class="nav">
      <li><a href="cadastrar.php">Cadastro</a></li>
      <li><a href="relatorio.php#">Relatórios</a></li>
      <li><a href="adm.php">Administração</a></li>
	  <li><a href="sair.php">Sair</a></li>
    </ul>
  </div>
</div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>