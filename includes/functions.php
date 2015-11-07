<?php  
/*
fonksiyon:
tarih_donustur
2011-10-04 00:46 tarihde oluşturuldu
	#parametreler
		$ayirac_arr : ilk eleman giriş tarihinin ikinci eleman ise çıkış tarihinin ayıracıdır
		$tarih  	: dönüştürülecek tarih (Formatı YIL/AY/GÜN varsa saat) olmalı
		$format_arr : çıktısını istediğiniz format (d:gün, m:ay, y:yıl, h:saat)
		$cikis_ayirac : $format değişkeninde kullandığınız çıkış ayıracını belirtir.	
	#parametreler
*/
function tarih_donustur($tarih,$giris_ayirac='-',$cikis_ayirac='/',$cikis_format='d/m/y/h' ) {//2011-05-05 
	if(empty($tarih)) return "";  
	//tarih böl 2011-07-05 21:22:11
	list($y,$m,$d_s)  	= explode($giris_ayirac,$tarih);
	list($d,$h)			= explode(" ", $d_s);
	
	//formatı böl
	$bul 		= array("d","m","y",$cikis_ayirac."h");
	$degistir 	= array( $d,$m ,$y ," ".$h);
	$cikis = str_replace($bul,$degistir,$cikis_format);	
	
	return $cikis;
}//end


function tarih_donustur_ymd($tarih,$giris_ayirac='/',$cikis_ayirac='-',$cikis_format='y-m-d-h' ) {//2011-05-05 
	if(empty($tarih)) return "";  
	//tarih böl 05-05-2011 21:22:11 
 	list($d,$m,$y_s)  = explode($giris_ayirac,$tarih);
	list($y,$h)= explode(" ", $y_s);

	//formatı böl
	$bul 		= array("d","m","y",$cikis_ayirac."h");
	$degistir 	= array( $d,$m ,$y ," ".$h);
	$cikis = str_replace($bul,$degistir,$cikis_format);	

	return $cikis; 
}//end

function tarih_donustur_takvim($tarih){
	//	Mon Nov 07 2011 00:00:00 GMT 0200 (GTB Standart Saati)
	list($gun_txt,$ay_txt,$gun,$yil,$saat,$gmt,$gmt_tur,$standart) = explode(" ",$tarih); 
	//ay no ver
	$ay = date("m",strtotime($ay_txt));
 	
	$yeni_tarih = $yil."-".$ay."-".$gun;
	return $yeni_tarih; 
}


function sql_guvenlik($data) {
        if ( !isset($data) or empty($data) ) return '';
        if ( is_numeric($data) ) return $data;

        $non_displayables = array(
            '/%0[0-8bcef]/',            // url encoded 00-08, 11, 12, 14, 15
            '/%1[0-9a-f]/',             // url encoded 16-31
            '/[\x00-\x08]/',            // 00-08
            '/\x0b/',                   // 11
            '/\x0c/',                   // 12
            '/[\x0e-\x1f]/'             // 14-31
        );
        foreach ( $non_displayables as $regex )
            $data = preg_replace( $regex, '', $data );
        $data = str_replace("'", "''", $data );
        return $data;
   } 

function mysql_guvenlik($deger){
$guvenli_sonuc = (($deger));
return ($guvenli_sonuc);	
}

function tirnak_cevir($deger){
   $bul_   = array("&#39;","&#34;");
   $degis_ = array("'","\"");
	
	return str_replace($bul_,$degis_,$deger); 
}
function replace_tr($text,$speacial_char = '_') {
	$text = trim($text);
	$search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ','-','?',',','\'','"','>','<','!','^','/','\\','&','(',')','=','{','}','*','+','$','#','@','%','~',';',':');
	$replace = array('c','c','g','g','i','i','o','o','s','s','u','u',$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char,$speacial_char);
 
	$new_text = str_replace($search,$replace,$text);
return strtolower($new_text);
}
   

function olcekle_height_ver($w,$h,$y_w){	
	return	$y_w * $h / $w;
}

function resim_olcu_ver($img , $hangi){
	$arr = getimagesize($img);
	if($hangi=="width"){
		return $arr[0];
	}else{
		return $arr[1];	
	}
}

function ust_kat_list($mysql,$kategori_id){	
			$mysql->set_table("kategoriler","where id='$kategori_id'");
				$kategori_ad = $mysql->get_data('kategori_adi');//72
				$kategori_id = $mysql->get_data('id');
				$nesil		 = $mysql->get_data('nesil');
				$ust_kategori_id		 = $mysql->get_data('ust_kategori_id');//71
	$isimler_arr = array();
			for($ns=0; $ns<$nesil; $ns++){			
						$mysql->set_table("kategoriler","where id='$ust_kategori_id'");			
							$ust_kategori_id 	= $mysql->get_data('ust_kategori_id');
							$ust_kat_adi 	 	= $mysql->get_data('kategori_adi');
							$kat_id 	 		= $mysql->get_data('id');
							array_push($isimler_arr,array("kategori_adi" => $ust_kat_adi, "kategori_id" => $kat_id));
			}
			$sonuc = array_reverse($isimler_arr);
		return $sonuc;				
}

function combo_kategori_listele($mysql,$ust_kategori_id,$tablo_adi,$echo=1,$gelen_kat_id=0,$disindakiler=array("") ){
		//çekilmeyecek kategoriler 
			$sql_dislananlar = " and ( ";
			$dis_sayi = count($disindakiler);
			for($i=0; $i<$dis_sayi; $i++){
				$dis_kat_id = $disindakiler[$i];
				$sql_dislananlar .= "id !='$dis_kat_id'";
				if($i!=$dis_sayi-1)$sql_dislananlar.=" or ";
				else $sql_dislananlar .= ")";	
			} 
		//çekilmeyecek kategoriler 
			 
		$label 		= '';
		 $alt_kategoriler = $mysql->set_table("kategoriler" , "where ust_kategori_id='$ust_kategori_id' and tablo_adi='$tablo_adi' $sql_dislananlar  order by id asc");	
	 
		if($alt_kategoriler > 0 ){
			for($nsl=0; $nsl < $alt_kategoriler; $nsl++){
			$mysql->set_table("kategoriler" , "where ust_kategori_id='$ust_kategori_id' and tablo_adi='$tablo_adi' $sql_dislananlar  order by id asc");	
				$id1				= $mysql->get_data("id",$nsl);
				$kategori_adi		= $mysql->get_data("kategori_adi",$nsl);
				$ust_kategori_id	= $mysql->get_data("ust_kategori_id",$nsl);
				$kisa_isim			= $mysql->get_data("kisa_isim",$nsl);
				$nesil				= $mysql->get_data("nesil",$nsl);
				$iceri_cizgi 		= '';	
				$class				= 'alt_kategori_alternatif';			
							
					for($iq=0; $iq<$nesil; $iq++){
						$iceri_cizgi .='&nbsp;&nbsp;';	
					} 
			   $label =' <option ';
			   if($gelen_kat_id == $id1){$label.=' selected="selected" '; }
			   $label .=' value="'.$id1.'">'.$iceri_cizgi.$kategori_adi.'</option> '; 
					
			if($echo == 1)echo $label;	
						else return $label;	
			combo_kategori_listele($mysql,$id1,$tablo_adi,$echo,$gelen_kat_id);		
			
			}//alt_kategori for  
			
		}else{
			return false;	
		}
}//end funct

function deleteImage($table,$name){
    unlink("../../uploads/$table/$name");
    unlink("../../uploads/$table/small-$name");
    unlink("../../uploads/$table/medium-$name");
}

/*
 *  returns a start row number and page count for limit sql
 */
function calculatePage($rowCount, $page, $limit){
    $pageInfo['startRow'] = ($page-1) * $limit;
    $pageInfo['pageCount'] = ceil($rowCount/$limit);
    return $pageInfo;
}
function makePerma($Filtre) {
    $Form_Mesaj = array (",","!","²","/","%","'",".",'"',"º"," ","ı","ç","ş","ğ","ü","ö","script", "SCRIPT", "select", "SELECT", "?", "*", "$", "<", "{", "[","\n","İ","Ç","Ş","Ğ","Ü","Ö"," ",";","-","_");
    $Form_Filtre = array("","","","_","_","_","_",'_',"","_","i","c","s","g","u","o","_","_","_","_","_","_","_","_","_","_","_", "i", "c", "s", "g", "u","o","_",";","","_");
    $Dondur = strtolower(str_replace($Form_Mesaj, $Form_Filtre, $Filtre));
    $Dondur = strtolower(str_replace("__", "_", $Dondur));
    $Dondur = strtolower(str_replace("__", "_", $Dondur));
    if (substr($Dondur,0,1) == "_")
    {
        $Dondur = ltrim($Dondur,"_");
    }
    return $Dondur;
}
function sayac($mysql,$table_name) //web sitesinde giriş yapanların ip sini alma ve sunucuya kaydetme
{
    if(getenv("HTTP_CLIENT_IP"))
    {
        $ip= getenv("HTTP_CLIENT_IP");
    }
    elseif(getenv("HTTP_X_FORWARDED_FOR"))
    {
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        if (strstr($ip, ','))
        {
            $tmp = explode (',', $ip);
            $ip = trim($tmp[0]);
        }
    } else
    {
        $ip = getenv("REMOTE_ADDR");
    }
    $_SESSION["ip"] = $ip;
    $whereStr2 = "ip = '$ip'";
    $rowCount = $mysql->rowCount("girisler",$whereStr2);
    if ($rowCount == 0)
    {
        $datas  = array(
            "ip" => $ip
        );
        $rowID 	= $mysql->insert($table_name,$datas);
    }
    $zaman=time();
    $limit=time()-60*5;
    $datas  = array(
        "durum" => "Offline"
    );
    $mysql->update($table_name,$datas,"tarih < '$limit'");
    $ipsayi = $mysql->rowCount("girisler","ip = '$ip'");
    if($ipsayi==0) {

        $datas  = array(
            "ip" => $ip,
            "durum" => "Online",
            "tarih" => $zaman
        );
        $mysql->insert($table_name,$datas);
}
    else {
        $datas  = array(
            "durum" => "Online",
            "tarih" => $zaman
        );
        $mysql->update($table_name,$datas,"ip = '$ip'");
    }
}

function get_path_info()
{
   return str_replace ($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']));
}
?>