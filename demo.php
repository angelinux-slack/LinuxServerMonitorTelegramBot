<?php
# author          Horacio Romero Mendez (angelos)
# License         Copyleft 2017
# since           28 de enero de 2017 12:36:09
# version         1.0

define('BOT_TOKEN', '<tuTokenAqui>');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

//OBTENER INFORMACION
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
$text = $update['message']['text'];
$file = "$chatID/$chatID.txt";

if ($text == "")
	die();


//CREAR DIRECTORIO PARA ESTADOS
if (!file_exists($chatID)) :
	mkdir($chatID, 0700, true);
	fopen($file, 'w');
endif;


//COMANDOS
switch ($text):

	case "/apacheerrorlog":
		file_put_contents($file, '');
		$msg = shell_exec("tail /var/log/httpd/error_log");
	break;

	case "/eximsendmaillog":
		file_put_contents($file, '');
		$msg = shell_exec("/usr/bin/sudo grep cwd /var/log/exim_mainlog | grep -v /var/spool | awk -F\"cwd=\" '{print $2}' | awk '{print $1}' | sort | uniq -c | sort -n");
	break;

	case "/firewall":
		$status = "$text,0";
		file_put_contents($file, $status);
		$msg = "Escribe la ip que se pondrá en lista blanca";
	break;	

	case "/free":
		file_put_contents($file, '');
		$msg = shell_exec("free -m");
	break;

	case "/last":
		file_put_contents($file, '');
		$msg = shell_exec("last -20");
	break;

	case "/ls":
		$status = "$text,0";
		file_put_contents($file, $status);
		$msg = "Escribe la ruta a listar";
	break;	

	case "/ping":
		$status = "$text,0";
		file_put_contents($file, $status);
		$msg = "Escribe el dominio o IP";
	break;		

	case "/ps":
		$status = "$text,0";
		file_put_contents($file, $status);
		$msg = "Escribe el texto a filtrar en los procesos";
	break;	

	case "/start" : 
		file_put_contents($file, '');
		$msg = "Bienvenido a Linux Server Monitor";
	break;

	case "/top" : 
		file_put_contents($file, '');
		$msg = shell_exec("/usr/bin/sudo top -b -n 1 | head -n 15");
	break;
	
	case "/uptime":
		file_put_contents($file, '');
		$msg = shell_exec("uptime");
	break;

	case "/versions":
		file_put_contents($file, '');
		$cen = shell_exec("cat /etc/redhat-release");
		$des = shell_exec("ls -lct --time-style=+\"%F %T\" / | tail -1 | awk '{print $6, $7}'");
		$apa = shell_exec("/usr/sbin/apachectl -v | grep 'Server version:'");
		$php = phpversion();
		$mys = shell_exec("mysql -V");
		$msg = "S.O.: $cen $des";
		$msg.= "Apache: $apa";
		$msg.= "PHP: $php";
		$msg.= "\nMySQL: $mys";
	break;

	case "/w":
		file_put_contents($file, '');
		$msg = shell_exec("w");
	break;

	case "/whois":
		$status = "$text,0";
		file_put_contents($file, $status);
		$msg = "Escribe el dominio a buscar";
	break;

	default:
		//SI YA SE ESTÁ EJECUTANDO UN COMANDO
		$st = explode(",", file_get_contents($file));

		switch ($st[0]):

			case "/firewall":
				$ip = $text;
				if (!filter_var($ip, FILTER_VALIDATE_IP) === false) :
					$csf = shell_exec("/usr/bin/sudo /usr/sbin/csf -a $ip Bot consoluciones");
					$hulk = shell_exec("/usr/bin/sudo /scripts/cphulkdwhitelist $ip");
					$msg = "CSF: $csf\n";
					$msg.= "CPHulk: $hulk";
				else :
					$msg = "$ip no es una IP válida";
				endif;
				$msg.= "\nPuede escribir otra IP";
			break;

			case "/ls":
				$msg = shell_exec("/usr/bin/sudo ls -lh $text");
				$msg.= "\nPuede escribir otra ruta a listar";
			break;

			case "/ping":
				$msg = shell_exec("/usr/bin/sudo ping $text -c 4");
				$msg.= "\nPuede escribir otro dominio o IP";
			break;

			case "/ps":
				$msg = shell_exec("ps aux | grep $text");
				$msg.= "\nPuede escribir otra palabra para filtrar";
			break;

			case "/whois":
				$msg = shell_exec("/usr/bin/sudo whois $text");
				$msg.= "\nPuede escribir otro dominio a buscar";
			break;
		endswitch;

	break;
endswitch;

$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".urlencode($msg);
file_get_contents($sendto);
?>
