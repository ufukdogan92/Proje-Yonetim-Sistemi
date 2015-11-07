<?php

header('Content-Type: text/html; charset="ISO-8859-9"');
include "../includes/autoload.php";
include "../includes/config.php";
include "../includes/functions.php";

$date   	= date("Y-m-d H:i:s");
$data 	    = $_POST["data"];//get data array from login form
$kullaniciAdi 	    = $data['kullaniciAdi'];
$password 	= md5($data["password"]);
if(empty($email) || empty($password) ){
    echo "0|||Giriþ Baþarýsýz!";
    exit;

}

$kullanici = $mysql->select("kullanicilar"," kullaniciAdi='$kullaniciAdi' and kullaniciParola ='$password'");
if(count($admin) < 1){
    echo "0|||Giriþ Baþarýsýz!";
    exit;
}

$kullaniciID = $kullanici[0]["kullaniciID"];

//LogIN
$infoArr = array("kullaniciID" => $kullaniciID );

$_SESSION["sessionID"] = $kullaniciID;

?>
1|||Hoþgeldiniz!
<script type="text/javascript" >
    window.location.reload();
</script>