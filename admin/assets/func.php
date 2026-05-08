<?php

function connect_pdo()
{
	$s = 'localhost'; $l = 'root'; $p = ''; $db = 'nourtv';
	$dsn = "mysql:host={$s};dbname={$db};charset=utf8mb4";
	try {
		return new PDO($dsn, $l, $p, [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		]);
	} catch (PDOException $e) {
		die('SERVER');
	}
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
	if($db instanceof PDO){
		$stmt = $db->prepare('SELECT '.$champ.' FROM '.$tab.' WHERE '.$champ.' = :val LIMIT 1');
		$stmt->execute([':val' => $val]);
		$d = $stmt->fetch();
	}else{
		$d = mysqli_fetch_array(mysqli_query($db,'SELECT * FROM '.$tab.' WHERE '.$champ.' = "'.$val.'"'));
	}
	if(empty($d[$champ])): return false;
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

function get_admin_by_id($db, $id)
{
    $stmt = $db->prepare('SELECT id, name, email, password, active FROM admin WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => (int)$id]);
    $admin = $stmt->fetch();
    return $admin ?: null;
}

function get_admin_by_email($db, $email)
{
    $stmt = $db->prepare('SELECT id, name, email, password, active FROM admin WHERE email = :email LIMIT 1');
    $stmt->execute([':email' => $email]);
    $admin = $stmt->fetch();
    return $admin ?: null;
}

function verify_admin_password($db, $admin, $plainPassword)
{
    if (!$admin || !isset($admin['password'])) {
        return false;
    }

    $hash = (string)$admin['password'];
    $ok = false;

    if (preg_match('/^\$2y\$/', $hash) || preg_match('/^\$argon2/i', $hash)) {
        $ok = password_verify($plainPassword, $hash);
    } else {
        $ok = hash_equals($hash, md5($plainPassword));
        if ($ok) {
            $newHash = password_hash($plainPassword, PASSWORD_DEFAULT);
            $stmt = $db->prepare('UPDATE admin SET password = :password WHERE id = :id');
            $stmt->execute([':password' => $newHash, ':id' => (int)$admin['id']]);
        }
    }

    return $ok;
}

function create_admin_user($db, $name, $email, $hash)
{
    $stmt = $db->prepare('INSERT INTO admin(id,name,email,password,active) VALUES (NULL,:name,:email,:password,0)');
    return $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':password' => $hash,
    ]);
}

function GetIdUser($db)
{
	if(!isset($_SESSION['admin_id']) || !validate_numeric((string)$_SESSION['admin_id'])) return false;
	$admin = get_admin_by_id($db, (int)$_SESSION['admin_id']);
	if($admin && isset($admin['id'])) return (int)$admin['id'];
	return false;
}

function loggedAdmin($db)
{
  if(isset($_SESSION['admin_id']) && validate_numeric((string)$_SESSION['admin_id'])){
	$admin = get_admin_by_id($db, (int)$_SESSION['admin_id']);
	if($admin && (int)$admin['active'] === 1) return true;
	else return false;
  }
}

function logged($db)
{
  if(isset($_SESSION['admin_id']) && validate_numeric((string)$_SESSION['admin_id'])){
	$admin = get_admin_by_id($db, (int)$_SESSION['admin_id']);
	if($admin && (int)$admin['active'] === 0) return true;
	else return false;
  }
}

function GetTableByID($db,$table,$champ,$val)
{
	if($db instanceof PDO){
		$stmt = $db->prepare('SELECT '.$champ.' FROM '.$table.' WHERE id = :id LIMIT 1');
		$stmt->execute([':id' => $val]);
		$d = $stmt->fetch();
	}else{
		$q = mysqli_query($db,'SELECT '.$champ.' FROM '.$table.' WHERE id = "'.$val.'"');
		$d = mysqli_fetch_array($q);
	}
	return isset($d[$champ]) ? $d[$champ] : null;
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

function news_image_name($photo, $size = 1200)
{
    $photo = trim((string)$photo);
    if ($photo === '') {
        return '';
    }

    $size = (int)$size;
    $baseDir = __DIR__ . '/../../assets/img/news/';

    if (strpos($photo, '.') !== false) {
        $info = pathinfo($photo);
        $name = $info['filename'] ?? $photo;
        $ext = strtolower($info['extension'] ?? '');

        if (preg_match('/-(300|600|1200)$/', $name)) {
            $root = preg_replace('/-(300|600|1200)$/', '', $name);
            $candidates = [
                $photo,
                $root . '-' . $size . '.webp',
                $root . '-' . $size . '.jpg',
                $root . '-' . $size . '.jpeg',
                $root . '-' . $size . '.png',
            ];
            foreach ($candidates as $candidate) {
                if (is_file($baseDir . $candidate)) {
                    return $candidate;
                }
            }
            return $photo;
        }

        if (is_file($baseDir . $photo)) {
            return $photo;
        }

        $fallback = $name . '-' . $size . '.webp';
        if (is_file($baseDir . $fallback)) {
            return $fallback;
        }

        return $name . ($ext !== '' ? '.' . $ext : '');
    }

    foreach (['webp', 'jpg', 'jpeg', 'png'] as $ext) {
        $candidate = $photo . '-' . $size . '.' . $ext;
        if (is_file($baseDir . $candidate)) {
            return $candidate;
        }
    }

    foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
        $candidate = $photo . '.' . $ext;
        if (is_file($baseDir . $candidate)) {
            return $candidate;
        }
    }

    return $photo . '-' . $size . '.webp';
}

function news_image_path($photo, $size = 1200)
{
    return 'assets/img/news/' . news_image_name($photo, $size);
}

/*------------ SITE ------------*/

function GetFunfNews($db,$i)
{
    $q = mysqli_query($db,'SELECT * FROM news where id_category = "'.$i.'" order by id desc limit 5');
		while ($d = mysqli_fetch_array($q)) 
		{
			$id[] = $d['id'];
			$titre[] = $d['titre'];
			$photo[] = news_image_name($d['photo'], 1200);
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
			$photo[] = news_image_name($d['photo'], 1200);
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
		$photo[] = news_image_name($d['photo'], 1200);
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
		$photo[] = news_image_name($d['photo'], 1200);
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
		$photo[] = news_image_name($d['photo'], 1200);
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
		$photo[] = news_image_name($d['photo'], 1200);
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
		$photo[] = news_image_name($d['photo'], 1200);
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
			$photo[] = news_image_name($d['photo'], 1200);
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
	$idss = []; $idcats = []; $nom = [];
	if($db instanceof PDO){
		$stmt = $db->prepare('SELECT * FROM sous_categories WHERE id_category = :id_category');
		$stmt->execute([':id_category' => (int)$ids]);
		while ($m = $stmt->fetch()) {
			$idss[] = $m['id'];
			$idcats[] = $m['id_category'];
			$nom[] = $m['name'];
		}
	}else{
		$q1 = mysqli_query($db,'SELECT * FROM sous_categories where id_category ="'.$ids.'"');
		while ($m = mysqli_fetch_array($q1)) {
			$idss[] = $m['id'];
			$idcats[] = $m['id_category'];
			$nom[] = $m['name'];
		}
	}	
	return array($idss,$idcats,$nom);
}

function CountSousMenuByMenu($db,$ids)
{
	if($db instanceof PDO){
		$stmt = $db->prepare('SELECT count(*) as nbr FROM sous_categories WHERE id_category = :id_category');
		$stmt->execute([':id_category' => (int)$ids]);
		$d = $stmt->fetch();
	}else{
		$d = mysqli_fetch_array(mysqli_query($db,'SELECT count(*) as nbr FROM sous_categories where id_category ="'.$ids.'"'));
	}
	return (int)($d['nbr'] ?? 0);
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
    $id = []; $name = [];
    if($db instanceof PDO){
		$q = $db->query('SELECT * FROM categories');
		while ($d = $q->fetch()) {
			$id[] = $d['id'];
			$name[] = $d['name'];
			}
		}else{
		$q = mysqli_query($db,'SELECT * FROM categories');
		while ($d = mysqli_fetch_array($q)) {
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
	}
	return array($id,$name);	
}

function GetAdminSousMenu($db)
{
	$id = []; $idcat = []; $name = [];
	if($db instanceof PDO){
		$q = $db->query('SELECT * FROM sous_categories');
		while ($d = $q->fetch()) {
			$id[] = $d['id'];
			$idcat[] = $d['id_category'];
			$name[] = $d['name'];
		}
	}else{
		$q = mysqli_query($db,'SELECT * FROM sous_categories');
		while ($d = mysqli_fetch_array($q)) {
			$id[] = $d['id'];
			$idcat[] = $d['id_category'];
			$name[] = $d['name'];
		}
	}	
	return array($id,$idcat,$name);
}

function GetAdminNews($db,$a)
{
	$id = []; $user = []; $category = []; $titre = []; $photo = [];
	if($db instanceof PDO){
		if($a =='1'){
			$q = $db->query('SELECT * FROM news WHERE id_category NOT IN (11,15) ORDER BY id DESC');
		}else{
			$stmt = $db->prepare('SELECT * FROM news WHERE id_pseudo = :id_pseudo AND id_category NOT IN (11,15) ORDER BY id DESC');
			$stmt->execute([':id_pseudo' => (int)$a]);
			$q = $stmt;
		}
		while ($d = $q->fetch()) {
			$id[] = $d['id'];
			$user[] = $d['id_pseudo'];
			$category[] = $d['id_category'];
			$titre[] = $d['titre'];
			$photo[] = news_image_name($d['photo'], 1200);
		}
	}else{
		if($a =='1'){
			$q = mysqli_query($db,'SELECT * FROM news where id_category not in (select id from categories where id = "11" or id = "15") order by id desc');
		}else{
			$q = mysqli_query($db,'SELECT * FROM news where id_pseudo="'.$a.'" and id_category not in (select id from categories where id = "11" or id = "15") order by id desc');
		}
		while ($d = mysqli_fetch_array($q)) {
			$id[] = $d['id'];
			$user[] = $d['id_pseudo'];
			$category[] = $d['id_category'];
			$titre[] = $d['titre'];
			$photo[] = news_image_name($d['photo'], 1200);
		}
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
			$photo[] = news_image_name($d['photo'], 1200);
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
    $id = []; $name = [];
    if($db instanceof PDO){
		$q = $db->query('SELECT * FROM categories WHERE id NOT IN (11,15)');
		while ($d = $q->fetch()) {
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
		}else{
		$q = mysqli_query($db,'SELECT * FROM categories where id not in (select id from categories where id = "11" or id = "15") ');
		while ($d = mysqli_fetch_array($q)) {
			$id[] = $d['id'];
			$name[] = $d['name'];
		}
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

/* FUNCTION <JDAD> */

function safeInt($value): int {
    return filter_var($value, FILTER_VALIDATE_INT) !== false ? (int)$value : 0;
}

function redirectHomeAndExit(): void {
    header('Location: ./', true, 302);
    exit;
}

function allowedTable(string $table): bool {
    return in_array($table, ['news', 'categories', 'sous_categories', 'caricature', 'opinion'], true);
}

function allowedColumn(string $col): bool {
    return in_array($col, [
        'id','titre','photo','auteur','description','description2','description3','description4','description5',
        'date','id_category','name','urlVideo','nVues','photos','id_writer'
    ], true);
}

function existsById(PDO $pdo, string $table, int $id): bool {
    if (!allowedTable($table)) return false;
    $sql = "SELECT 1 FROM `$table` WHERE id = :id LIMIT 1";
    $st = $pdo->prepare($sql);
    $st->execute([':id' => $id]);
    return (bool)$st->fetchColumn();
}

function getById(PDO $pdo, string $table, string $column, int $id) {
    if (!allowedTable($table) || !allowedColumn($column)) return null;
    $sql = "SELECT `$column` FROM `$table` WHERE id = :id LIMIT 1";
    $st = $pdo->prepare($sql);
    $st->execute([':id' => $id]);
    return $st->fetchColumn();
}

function incrementViews(PDO $pdo, int $id): void {
    $sql = "UPDATE `news` SET `nVues` = COALESCE(`nVues`,0) + 1 WHERE `id` = :id";
    $st = $pdo->prepare($sql);
    $st->execute([':id' => $id]);
}

function migrate_news_images_to_webp_sizes($db, $limit = 0)
{
    $newsDir = __DIR__ . '/../../assets/img/news/';
    if (!is_dir($newsDir)) {
        return ['updated' => 0, 'skipped' => 0, 'errors' => ['news_dir_missing']];
    }

    $updated = 0;
    $skipped = 0;
    $errors = [];
    $sizes = [300, 600, 1200];

    if (!($db instanceof PDO)) {
        return ['updated' => 0, 'skipped' => 0, 'errors' => ['pdo_required']];
    }

    $sql = 'SELECT id, titre, photo FROM news WHERE photo IS NOT NULL AND photo <> "" ORDER BY id ASC';
    if ((int)$limit > 0) {
        $sql .= ' LIMIT ' . (int)$limit;
    }
    $rows = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    $updateStmt = $db->prepare('UPDATE news SET photo = :photo WHERE id = :id');

    foreach ($rows as $row) {
        $id = (int)($row['id'] ?? 0);
        $photo = trim((string)($row['photo'] ?? ''));
        $title = trim((string)($row['titre'] ?? ''));
        if ($id <= 0 || $photo === '') {
            $skipped++;
            continue;
        }

        $sourceName = news_image_name($photo, 1200);
        $sourcePath = $newsDir . $sourceName;
        if (!is_file($sourcePath)) {
            $fallbackPath = $newsDir . $photo;
            if (is_file($fallbackPath)) {
                $sourcePath = $fallbackPath;
            } else {
                $errors[] = 'missing_source:' . $id;
                $skipped++;
                continue;
            }
        }

        $imageInfo = @getimagesize($sourcePath);
        if (!$imageInfo || !isset($imageInfo[2])) {
            $errors[] = 'invalid_image:' . $id;
            $skipped++;
            continue;
        }

        switch ($imageInfo[2]) {
            case IMAGETYPE_JPEG:
                $srcImage = @imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $srcImage = @imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $srcImage = @imagecreatefromgif($sourcePath);
                break;
            case IMAGETYPE_WEBP:
                $srcImage = function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($sourcePath) : false;
                break;
            default:
                $srcImage = false;
        }

        if (!$srcImage) {
            $errors[] = 'gd_open_failed:' . $id;
            $skipped++;
            continue;
        }

        $slug = preg_replace('/[^\p{L}\p{N}]+/u', '-', mb_strtolower($title, 'UTF-8'));
        $slug = trim((string)$slug, '-');
        if ($slug === '') {
            $slug = 'news-' . $id;
        }
        $baseName = $slug . '-' . time();
        $srcW = imagesx($srcImage);
        $srcH = imagesy($srcImage);
        $ratio = $srcW / max($srcH, 1);
        $okAll = true;

        foreach ($sizes as $size) {
            $targetW = (int)$size;
            $targetH = (int)max(1, round($targetW / max($ratio, 0.00001)));
            $canvas = imagecreatetruecolor($targetW, $targetH);
            if (!$canvas) {
                $okAll = false;
                break;
            }
            imagecopyresampled($canvas, $srcImage, 0, 0, 0, 0, $targetW, $targetH, $srcW, $srcH);

            $jpgPath = $newsDir . $baseName . '-' . $size . '.jpg';
            $webpPath = $newsDir . $baseName . '-' . $size . '.webp';
            if (!imagejpeg($canvas, $jpgPath, 82)) {
                $okAll = false;
                imagedestroy($canvas);
                break;
            }
            if (function_exists('imagewebp')) {
                @imagewebp($canvas, $webpPath, 82);
            }
            imagedestroy($canvas);
        }

        imagedestroy($srcImage);

        if (!$okAll) {
            $errors[] = 'generate_failed:' . $id;
            $skipped++;
            continue;
        }

        $newPhoto = $baseName . '-1200.jpg';
        $updateStmt->execute([
            ':photo' => $newPhoto,
            ':id' => $id,
        ]);
        $updated++;
    }

    return ['updated' => $updated, 'skipped' => $skipped, 'errors' => $errors];
}

function count_missing_news_images($db)
{
    if (!($db instanceof PDO)) {
        return 0;
    }

    $newsDir = __DIR__ . '/../../assets/img/news/';
    if (!is_dir($newsDir)) {
        return 0;
    }

    $rows = $db->query('SELECT photo FROM news WHERE photo IS NOT NULL AND photo <> ""')->fetchAll(PDO::FETCH_ASSOC);
    $missing = 0;

    foreach ($rows as $row) {
        $photo = trim((string)($row['photo'] ?? ''));
        if ($photo === '') {
            continue;
        }

        $resolved = news_image_name($photo, 1200);
        $primaryPath = $newsDir . $resolved;
        $legacyPath = $newsDir . $photo;

        if (!is_file($primaryPath) && !is_file($legacyPath)) {
            $missing++;
        }
    }

    return $missing;
}

function update_news_photo_db_type_to_webp($db, $limit = 0)
{
    if (!($db instanceof PDO)) {
        return ['updated' => 0, 'skipped' => 0, 'errors' => ['pdo_required']];
    }

    $newsDir = __DIR__ . '/../../assets/img/news/';
    if (!is_dir($newsDir)) {
        return ['updated' => 0, 'skipped' => 0, 'errors' => ['news_dir_missing']];
    }

    $sql = 'SELECT id, photo FROM news WHERE photo IS NOT NULL AND photo <> "" AND (LOWER(photo) LIKE "%.jpg" OR LOWER(photo) LIKE "%.jpeg") ORDER BY id ASC';
    if ((int)$limit > 0) {
        $sql .= ' LIMIT ' . (int)$limit;
    }

    $rows = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $updateStmt = $db->prepare('UPDATE news SET photo = :photo WHERE id = :id');
    $updated = 0;
    $skipped = 0;
    $errors = [];

    foreach ($rows as $row) {
        $id = (int)($row['id'] ?? 0);
        $photo = trim((string)($row['photo'] ?? ''));
        if ($id <= 0 || $photo === '') {
            $skipped++;
            continue;
        }

        $webpPhoto = preg_replace('/\.(jpe?g)$/i', '.webp', $photo);
        if ($webpPhoto === null || $webpPhoto === $photo) {
            $skipped++;
            continue;
        }

        if (!is_file($newsDir . $webpPhoto)) {
            $errors[] = 'missing_webp:' . $id;
            $skipped++;
            continue;
        }

        $updateStmt->execute([
            ':photo' => $webpPhoto,
            ':id' => $id,
        ]);
        $updated++;
    }

    return ['updated' => $updated, 'skipped' => $skipped, 'errors' => $errors];
}