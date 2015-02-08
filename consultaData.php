<?php

/*******************************************************************************
 * Titulo...........: Consultar por data								   	   *
 * Autor............: Ronaldo Torre 										   *
 * Data.............: 08/02/2015 											   *
 *-----------------------------------------------------------------------------*
 ******************************************************************************/


class consultarData{
    
    private $SQL;
    
    public function __construct(){
        $this->SQL='SELECT * FROM matriculas ';
    }
    
    /** 
     * Metodo contular data por mes
     * Esse metodo recebe um mês como parametro e utiliza a SQL para retornar
     * uma lista de registros do mês parametro, basta persistir essa SQL.
     * Exemplo: Mês 02 irá retornar todos os registros da tabela que a data 
     * tem mês 02.
     */
    public function porMes($mes){
        if(($mes!='null')||($mes!=null)){
            $this->SQL = $this->SQL." WHERE DATA LIKE '%/".$mes."/%'";
            return $this->SQL;
        }
        else{
            return null;   
        }
    }
    
    
    /** 
     * Metodo consutlar data e retornar data
     * Esse metodo receber umm mes como parametro (02) e retornar uma linha
     * em esemplo 02/02/2015 
     */
    public function retornarData($mes){
        if(($mes!='null')||($mes!=null)){
            $this->SQL ="SELECT DATA FROM MATRICULAS WHERE DATA LIKE '%/".$mes."/%' limit 1"; 
            return $this->SQL;
        }
        else{
            return null;   
        }
    }
    
    
    /**
     * Metodo stMes
     * Esse médoto receber como parametro uma data proviniente do método retornarMês
     * e retorna um Mês por extenso.
     */
    public function strMes($data){
        if(($data!='null')||($data!=null)){  
            $d = explode('/', $data);
            $mok = $d[1];
            
            switch ($mok) {
                case 01:
                    $m= 'Janeiro';
                    break;
                case 02:
                    $m= 'Fevereiro';
                    break;
                case 03:
                    $m= 'Março';
                    break;
                case 04:
                    $m= 'Abril';
                    break;
                case 05:
                    $m= 'Maio';
                    break;
                case 06:
                    $m= 'Junho';
                    break;
                case 07:
                    $m= 'Julho';
                    break;
                case 08:
                    $m= 'Agosto';
                    break;
                case 09:
                    $m= 'Setembro';
                    break;
                case 10:
                    $m= 'Outubro';
                    break;
                case 11:
                    $m= 'Novembro';
                    break;
                case 12:
                    $m= 'Dezembro';
                    break;
            }
            
            if(($m != null)||($m != 'null')){
                return $m;
            }
            else{
                return null;   
            }
            
        }
        else{
            return null;   
        }
    }
    
}

?>