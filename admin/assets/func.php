<?php

function connect()
{
	
	//$s = 'localhost'; $l = 'alnoortv_alnoortv'; $p = 'KjDijJX*i%TS'; $db = 'alnoortv_chawki';
	$s = 'localhost'; $l = 'root'; $p = ''; $db = 'nourtv';
	
	$link = mysqli_connect($s,$l,$p,$db) or die('SERVER');
	mysqli_set_charset($link,"utf8");
	
	return $link;
}


function curPageName() 
{
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

function validate_Text($str)
{

	$mask = 'a-zA-Z0-9\n\r %()،.,؟!:"`“”<>#|&بتثجحخدذرزسشصضءيوهنملكقفغعظطآٱأإةؤئىàçéÔÎÛÂâêÊûîôè، َ ً ُ ٌ ِ ْ ٍ ّ؟.,?²!:<\/>\-+*_"';
	return preg_match('/^['.$mask.' ]+$/',$str);	
}

function validate_numeric($str)
{
	return preg_match('/^[0-9]+$/',$str);
}

function validate_numeric_spce($str)
{
	return preg_match('/^[0-9 ]+$/',$str);
}

function validate_float($str)
{
	return preg_match('/^([0-9 ])+(\,[0-9]{1,3})?$/',$str);
}

function validate_alpha($str)
{
	return preg_match('/^[a-zA-Z]+$/',$str);
}

function validate_alpha_psce($str)
{
	return preg_match('/^[a-zA-Z ]+$/',$str);
}

function validate_alphanumeric($str) 
{
	return preg_match('/^[a-zA-Z0-9]+$/',$str);
}

function validate_arab($str)
{
	$mask = 'a-z A-Z 0-9 %()،.,؟!:"` ’ àçéÔÎÛÂâêÊûîôè #<> ? َ ً ُ ٌ  ابتثجحخدذرزسشصضءيوهنملكقفغعظطآـــــا “”ٱاًآأإةؤئى';
	return preg_match('/^['.$mask.' ]+$/',$str);
}

function replace($str){
	$s1 = str_replace('ٌ', '', str_replace('ُ', '', str_replace('ّ', '', str_replace('ِ', '', str_replace('؟', '', str_replace('“', '', str_replace('،', '', str_replace('”', '', str_replace(':', '', str_replace('!', '', $str)))))))))); 
    $s2 = str_replace(')', '',str_replace('(', '',str_replace('é', 'e',str_replace('à', 'a',str_replace(',', '',str_replace('"', '', str_replace('?', '', str_replace('.', '', str_replace(' ', '-', $s1)))))))));
    $s3 = str_replace(',', '', $s2);
    return $s2;
}


function validate_desarab($str)
{
	$st = str_replace('/','',str_replace('<ul>','',str_replace('<li>','',str_replace('&rdquo;','',str_replace('</ul>','',str_replace('&nbsp;','',str_replace('</li>','',str_replace('<br>','',str_replace('<strong>','',str_replace('</strong>','',str_replace('<p>','',str_replace('</p>','',$str))))))))))));
	$mask = '\n\r 0-9 -،.,?!:><”  ابتثجحخدذرزسشصضءيوهنملكقفغعظطآٱأإةؤئى"';
	return preg_match('/^['.$mask.' ]+$/',$st);
}

function validate_stringLong($str) 
{
	return preg_match('/^[a-zA-Z0-9 àçéÔÎÛÂâêÊûîôè.,?!:-_()\'&\"]+$/',$str);
}

function validate_AlphaAccents($str) 
{
	return preg_match('/^[a-zA-Z àçéÔÎÛÂâêÊûîôè]+$/',$str);
}

function validate_stringDouble($str) 
{
	
	return preg_match('/^[a-zA-Z0-9\n\r ابتثجحخدذرزسشصضءيوهنملكقفغعظطآٱأإةؤئىàçéÔÎÛÂâêÊûîôè،.,?²!:<\/>\-+*_()\'&\"]+$/',$str);
} 

function valide_url($url)
{
if (preg_match('/^https:\/\/(?:www\.)?(?:youtube.com|youtu.be)\/(?:watch\?(?=.*v=([\w\-]+))(?:\S+)?|([\w\-]+))$/', $url)):
	return true;
	else:
	return false;
endif;
}

function exist($db,$champ,$val,$tab)
{	
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT * FROM '.$tab.' WHERE '.$champ.' = "'.$val.'"'));	
	if($d[$champ]==''): return false;
		else: return true;
	endif;
}

function email_V($email)
{
	$atom   = '[-a-z0-9_]';   // caract&egrave;res autoris&eacute;s avant l'arobase
	$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caract&egrave;res autoris&eacute;s apr&egrave;s l'arobase (nom de domaine)
									   
	$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caract&egrave;res autoris&eacute;s avant l'arobase
	'(\.' . $atom . '+)*' .         // Suivis par z&eacute;ro point ou plus
										// s&eacute;par&eacute;s par des caract&egrave;res autoris&eacute;s avant l'arobase
	'@' .                           // Suivis d'un arobase
	'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 &agrave; 63 caract&egrave;res autoris&eacute;s pour le nom de domaine
										// s&eacute;par&eacute;s par des points
	$domain . '{2,63}$/i';          // Suivi de 2 &agrave; 63 caract&egrave;res autoris&eacute;s pour le nom de domaine
		
	// test de l'adresse e-mail
	if (preg_match($regex, $email)):
		return true;
	else:
		return false;
	endif;	
}


function cripter($ster,$nb)
{
	$d = $ster+$nb;
	return $d;	
}

function decripter($ster,$nb)
{
	$d = $ster-$nb;
	return $d;	
}

function Get_current_page()
{
	$currentpage=$_SERVER['SCRIPT_NAME'];
	$currentpage=basename($_SERVER['SCRIPT_NAME']);
	return $currentpage;
}

function GetIdUser($db)
{
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT * FROM admin WHERE MD5(id) = "'.$_SESSION['login_admin'].'"'));
	if($d['id']!='') return $d['id'];
	else return false;
}

function loggedAdmin($db)
{
  if(isset($_SESSION['login_admin'])){
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT * FROM admin WHERE MD5(id) = "'.$_SESSION['login_admin'].'" and active = 1'));
	if($d['id']!='') return true;
	else return false;
  }
}

function logged($db)
{
  if(isset($_SESSION['login_admin'])){
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT * FROM admin WHERE MD5(id) = "'.$_SESSION['login_admin'].'" and active = 0'));
	if($d['id']!='') return true;
	else return false;
  }
}

function GetTableByID($db,$table,$champ,$val)
{
	$q = mysqli_query($db,'SELECT '.$champ.' FROM '.$table.' WHERE id = "'.$val.'"');
	$d = mysqli_fetch_array($q);
		
	return $d[$champ];
}

function arabicDate($time)
{
	$months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
	$month = $months[date('M', strtotime($time))];
	
	$date =date('d', strtotime($time)) . ' ' . $month . ' ' . date('Y', strtotime($time));

	return $date;
}

function GetAujordhui($time)
{
	$months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
	$days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
	$day = $days[date('D', strtotime($time))];
	$month = $months[date('M', strtotime($time))];
	
	$date = $day . ' ' . date('d', strtotime($time)) . ' ' . $month . ' ' . date('Y', strtotime($time));

	return $date;
}

function time_stamp($timestamp)
{
	$time_ago = strtotime($timestamp);

    $current_time = time();  
    $time_difference = $current_time - $time_ago;  
    $seconds = $time_difference;  
    $minutes = round($seconds / 60 );  
    $hours   = round($seconds / 3600);
	$days    = round($seconds / 86400); 
	
	if($seconds <= 60){ return "الآن"; }  
    else if($minutes <=60){ 
		if($minutes==1) { return "قبل دقيقة "; } 
		else{ return "قبل $minutes دقائق";  } 
	} else if($hours <=24) { 
		if($hours==1){ return " قبل ساعة"; }  
		else { return "قبل $hours ساعات";}  
	}  
}

function GetDateNews($time){
	$months = ["Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر"];
	$days = ["Sat" => "السبت", "Sun" => "الأحد", "Mon" => "الإثنين", "Tue" => "الثلاثاء", "Wed" => "الأربعاء", "Thu" => "الخميس", "Fri" => "الجمعة"];
	$day = $days[date('D', strtotime($time))];
	$month = $months[date('M', strtotime($time))];
	
	$date = $day . ' ' . date('d', strtotime($time)) . ' ' . $month . ' ' . date('Y', strtotime($time)).' - '.date('H', strtotime($time)).':'.date('i', strtotime($time));

	return $date;
}

function HeureCh($date)
{
	if(date('Y-m-d', strtotime($date)) == gmdate('Y-m-d')):
		return time_stamp($date);
	elseif(date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime(gmdate('Y-m-d').'-1 days'))):
		return arabicDate($date);
	else:
		return arabicDate($date);
	endif;
}

function generate_image_thumbnail($source_image_path, $thumbnail_image_path,$w,$h)
{
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
    switch ($source_image_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_image_path);
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = $w / $h;
    if ($source_image_width <= $w && $source_image_height <= $h) {
        $thumbnail_image_width = $source_image_width;
        $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_image_width = (int) ($h * $source_aspect_ratio);
        $thumbnail_image_height = $h;
    } else {
        $thumbnail_image_width = $w;
        $thumbnail_image_height = (int) ($w / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
    $img_disp = imagecreatetruecolor($w,$h);
    $backcolor = imagecolorallocate($img_disp,0x00, 0x00, 0x00);
    imagefill($img_disp,0,0,$backcolor);
    imagecopy($img_disp, $thumbnail_gd_image, (imagesx($img_disp)/2)-(imagesx($thumbnail_gd_image)/2), (imagesy($img_disp)/2)-(imagesy($thumbnail_gd_image)/2), 0, 0, imagesx($thumbnail_gd_image), imagesy($thumbnail_gd_image));
    imagejpeg($img_disp, $thumbnail_image_path, 60);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    imagedestroy($img_disp);
    return true;
}

/*------------ SITE ------------*/

function GetFunfNews($db,$i)
{
    $q = mysqli_query($db,'SELECT * FROM news where id_category = "'.$i.'" order by id desc limit 5');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$titre[] = $d['titre'];
			$photo[] = $d['photo'];
			$date[] = $d['date'];
		}
	return array($id,$titre,$photo,$date);	
}

function GetZweiNews($db,$i)
{
    $q = mysqli_query($db,'SELECT * FROM news where id_category = "'.$i.'" order by id desc limit 2');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$titre[] = $d['titre'];
			$photo[] = $d['photo'];
			$date[] = $d['date'];
		}
	return array($id,$titre,$photo,$date);	
}

function NbrAkhbar($db,$i)
{
    $q = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM news where id_category = "'.$i.'"'));
	return $q['nbr'];
}

function GetMustajidaat($db){
	$q = mysqli_query($db,'SELECT * FROM news where mustajidaat = "2" order by id desc limit 9');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
	}
	return array($id,$titre);				
}

function GetLatestNews($db){
	$q = mysqli_query($db,'SELECT * FROM news where latestNews = "2" order by id desc limit 9');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
		$photo[] = $d['photo'];
		$date[] = $d['date'];
	}
	return array($id,$titre,$photo,$date);				
}

function GetOpinion($db){
	$l = mysqli_query($db,'SELECT * FROM opinion order by id desc limit 6');
		while ($l2 = mysqli_fetch_array($l)) 
		{
			$id[] = $l2['id'];
			$idwriter[] =$l2['id_writer'];
			$titre[] = $l2['titre'];
		}
		
		return array($id,$idwriter,$titre);	
}

function GetInfo($db){
	$y = mysqli_query($db,'SELECT * FROM caricature order by id desc limit 10');
		while ($y2 = mysqli_fetch_array($y)) 
		{
			$id[] = $y2['id'];
			$photo[] = $y2['photo'];
			$titre[] = $y2['titre'];
		}
		
		return array($id,$photo,$titre);	
}

function  Urgent($db){
	$q = mysqli_query($db,'SELECT * FROM news where urgent = "2" and date > DATE_SUB(NOW(), INTERVAL 10 MINUTE) order by date desc limit 5');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
	}
	return array($id,$titre);	
}

function CountUrgent($db){
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM news where urgent = "2" and date > DATE_SUB(NOW(), INTERVAL 10 MINUTE)'));
	return $d['nbr'];
}

function MostWatchedDay($db){
	$q = mysqli_query($db,'SELECT * FROM news where id_category not in (select id from categories where id = "11" or id = "15") and date LIKE "'.date("Y-m-d").'%" order by nVues desc  limit 9');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
		$photo[] = $d['photo'];
		$nVues[] = $d['nVues'];
	}
	return array($id,$titre,$photo,$nVues);				
}

function  Last24hours($db){
	$q = mysqli_query($db,'SELECT * FROM news where id_category not in (select id from categories where id = "11" or id = "15") and date > DATE_SUB(NOW(), INTERVAL 24 HOUR) order by nVues desc  limit 10');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
		$photo[] = $d['photo'];
		$nVues[] = $d['nVues'];
		$date[] = $d['date'];
	}
	return array($id,$titre,$photo,$nVues,$date);	
}

function MostWatchedWeek($db){
	$startDate = time();
	$q = mysqli_query($db,'SELECT * FROM news where id_category not in (select id from categories where id = "11" or id = "15") and date between  "'.date('Y-m-d', strtotime('-7 day', $startDate)).'" and "'.date("Y-m-d").'"   order by nVues desc  limit 10');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
		$photo[] = $d['photo'];
		$nVues[] = $d['nVues'];
	}
	return array($id,$titre,$photo,$nVues);				
}

function MostWatched($db){
	$q = mysqli_query($db,'SELECT * FROM news where id_category not in (select id from categories where id = "11" or id = "15") order by nVues desc  limit 9');
	while ($d = mysqli_fetch_array($q)) 
	{
		$id[] = $d['id'];
		$titre[] = $d['titre'];
		$photo[] = $d['photo'];
		$nVues[] = $d['nVues'];
	}
	return array($id,$titre,$photo,$nVues);				
}

function GetVideo($db)
{
    $q = mysqli_query($db,'SELECT * FROM news where id_category = "11" order by id desc limit 5');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$titre[] = $d['titre'];
			$photo[] = $d['photo'];
			$url[] = $d['urlVideo'];
		}
	return array($id,$titre,$photo,$url);	
}

function GetTotalVideo($db)
{	
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM news where id_category = "11"'));
	return $d['nbr'];
}

function GetSousMenuByMenu($db,$ids)
{
	$q1 = mysqli_query($db,'SELECT * FROM sous_categories where id_category ="'.$ids.'"');
	while ($m = mysqli_fetch_array($q1)) 
		{
			$idss[] = $m['id'];
			$idcats[] = $m['id_category'];
			$nom[] = $m['name'];
		}	
	return array($idss,$idcats,$nom);
}

function CountSousMenuByMenu($db,$ids)
{
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM sous_categories where id_category ="'.$ids.'"'));
	return $d['nbr'];
}

function GetAdminMenu($db)
{
    $q = mysqli_query($db,'SELECT * FROM categories');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
		
		return array($id,$name);	
}

/*------------ ADMIN ------------*/

function GetAdminCategories($db)
{
    $q = mysqli_query($db,'SELECT * FROM categories');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
		
		return array($id,$name);	
}

function GetAdminSousMenu($db)
{
	$q = mysqli_query($db,'SELECT * FROM sous_categories');
	while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$idcat[] = $d['id_category'];
			$name[] = $d['name'];
		}	
	return array($id,$idcat,$name);
}

function GetAdminNews($db,$a)
{
	if($a =='1'){
		$q = mysqli_query($db,'SELECT * FROM news where id_category not in (select id from categories where id = "11" or id = "15") order by id desc');
	}else{
		$q = mysqli_query($db,'SELECT * FROM news where id_pseudo="'.$a.'" and id_category not in (select id from categories where id = "11" or id = "15") order by id desc');
	}
    
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$user[] = $d['id_pseudo'];
			$category[] = $d['id_category'];
			$titre[] = $d['titre'];
			$photo[] = $d['photo'];
		}
	return array($id,$user,$category,$titre,$photo);	
}

function GetAdminWriters($db)
{
    $z = mysqli_query($db,'SELECT * FROM writers');
		while ($n = mysqli_fetch_array($z)) 
		{
			$id[] = $n['id'];
			$nom[] = $n['nom'];
			$photo[] = $n['photo'];
		}
		
		return array($id,$nom,$photo);	
}

function GetAdminOpinion($db){
	$l = mysqli_query($db,'SELECT * FROM opinion order by id desc');
		while ($l2 = mysqli_fetch_array($l)) 
		{
			$id[] = $l2['id'];
			$idwriter[] =$l2['id_writer'];
			$titre[] = $l2['titre'];
		}
		
		return array($id,$idwriter,$titre);	
}

function GetAdminVideo($db,$a)
{
	if($a == '1'){
		$q = mysqli_query($db,'SELECT * FROM news where id_category in (select id from categories where id = "11") order by id desc');  
	}else{
		$q = mysqli_query($db,'SELECT * FROM news where id_pseudo="'.$a.'" and id_category in (select id from categories where id = "11") order by id desc');
	}
    
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$user[] = $d['id_pseudo'];
			$category[] = $d['id_category'];
			$titre[] = $d['titre'];
			$photo[] = $d['photo'];
		}
	return array($id,$user,$category,$titre,$photo);	
}

function GetAdminInfo($db){
	$y = mysqli_query($db,'SELECT * FROM caricature order by id desc');
		while ($y2 = mysqli_fetch_array($y)) 
		{
			$id[] = $y2['id'];
			$photo[] = $y2['photo'];
			$titre[] = $y2['titre'];
		}
		
		return array($id,$photo,$titre);	
}

function CountNews($db,$ids)
{
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM news where id_category ="'.$ids.'"'));
	return $d['nbr'];
}

function CountVideos($db)
{
	$d = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM news where id_category = "10" and id_sousCategory="1"'));
	return $d['nbr'];
}

function GetAdminMenuNews($db)
{
    $q = mysqli_query($db,'SELECT * FROM categories where id not in (select id from categories where id = "11" or id = "15") ');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
		
		return array($id,$name);	
}

function GetAdminVedions($db)
{
    $q = mysqli_query($db,'SELECT * FROM categories where id in (select id from categories where id = "11") ');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
		
		return array($id,$name);	
}