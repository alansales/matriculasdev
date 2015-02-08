<?php

/*******************************************************************************
 * Titulo...........: Consultar por data								   	   *
 * Autor............: Ronaldo Torre 										   *
 * Data.............: 08/02/2015 											   *
 *-----------------------------------------------------------------------------*
 ******************************************************************************/


require_once('config/conn.php');

// Instanciando novo objeto da classe Login
$objLogin = new Login();

// Verificando se o usuário está logado, caso contrá será redirecionado para a página de login
if (!$objLogin->verificar('index.html')){
    // Finalizado o script, apenas para garantir que o usuário irá ver o conteúdo da página
    exit;   
}
 
//requerer objeto consultaData
requeire_once('consutaData.php');
$c = new consultarData();

$mes='02';

print 'Consultar matriculas do Mês de Fevereiro';
$dados = mysql_query($c->porMes($mes));

//listar das matriculas de fevereiro
print 'Data         | QTDE';
while($linha = mysql_fetch_assoc($dados)); 
     print $linha['data'].'   '.$linha['quantidade'];
} 

print 'Somar a quantde dos registros do mes';
$soma = mysql_query($c->somarQtdePorMes($mes));
print soma;     

print 'Retornar em string o mes selecionado';
$data = mysql_query($c->retornarData($mes));
print $c->strMes($data);

?>