<?php 

	/*URLS*/
	function base_url()
	{
		return BASE_URL;
	}

    function assets()
    {
        return BASE_URL."/Assets";
    }

function media()
    {
        return BASE_URL."/Img";
    }


function categ()
    {
        return BASE_URL."/View/Categorias/categorias.php";
    }


function headerTienda($data="")

{

    $view_header="View/Templates/header_tienda.php";
    require_once ($view_header);

}

function footerTienda($data="")

{

    $view_footer="View/Templates/footer_tienda.php";
    require_once ($view_footer);

}

function carrouselTienda($data="")

{

    $view_footer="View/Templates/carrousel_tienda.php";
    require_once ($view_footer);

}

	/*INFO FORMATEADA*/
	function dp($data)
	{
		$format= print_r('<pre>');
		$format= print_r($data);
		$format= print_r('</pre>');
	}
    /*GENERA CONTRASEÑA*/
	function passwordGenerator($length=20)
		
{
    $pass = "";
    $longitudPass = $length;
    
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()_+-=";
    $longitudCadena = strlen($cadena);

    for($i = 1; $i <= $longitudPass; $i++)
    {
        $pos = rand(0, $longitudCadena - 1);
        $pass .= substr($cadena, $pos, 1);
    }
    return $pass;
	}

	 /*ELIMINA ESPACIOS Y CARACTERES NO DESEADOS*/

    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); 
        $string = stripslashes($string); 
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }

    /*TOKEN*/
function tokenGenerator()
{
    $r1 = bin2hex(openssl_random_pseudo_bytes(10));
    $r2 = bin2hex(openssl_random_pseudo_bytes(10));
    $r3 = bin2hex(openssl_random_pseudo_bytes(10));
    $r4 = bin2hex(openssl_random_pseudo_bytes(10));
    $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
    return $token;
}

/*FORMATO DINERO*/

function moneyFormat($cant, $SPD = ',', $SPM = '.') {
    return number_format($cant, 2, $SPD, $SPM);
}

 ?>