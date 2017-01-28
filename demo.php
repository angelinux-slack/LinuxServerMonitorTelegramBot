<?php
# author          Horacio Romero Mendez (angelos)
# License         Copyleft 2017
# since           28 de enero de 2017 12:36:09
# version         1.0

define('BOT_TOKEN', '299777023:AAG-8-y2vpBctKzKFaLAoBhWYh-bYrc-3gw');
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
		$msg = "[Sat Jan 28 13:37:23 2017] [error] [client 1.2.3.4] File does not exist: /home/user/public_html/favicon.ico, referer: http://www.user.com/
[Sat Jan 28 13:37:23 2017] [error] [client 1.2.3.4] File does not exist: /home/user/public_html/404.shtml, referer: http://www.user.com/
[Sat Jan 28 13:38:28 2017] [error] [client 1.2.3.4] File does not exist: /home/user/public_html/?";
	break;

	case "/eximsendmaillog":
		$msg = "53 /home/user1
790 /home/user/public_html/contact
1927 /usr/local/cpanel/whostmgr/docroot
2812 /home/user2/public_html/spamdurectory
3738 /etc/csf";
	break;

	case "/firewall":
		$msg = "CSF: Adding 1.2.3.4 to csf.allow and iptables ACCEPT...
ACCEPT  all opt -- in !lo out *  1.2.3.4  -> 0.0.0.0/0  
ACCEPT  all opt -- in * out !lo  0.0.0.0/0  -> 1.2.3.4  

CPHulk: 1.2.3.4 has been whitelisted";
	break;	

	case "/free":
		$msg = "total       used       free     shared    buffers     cached
Mem:          7941       7038        902          0        413       3818
-/+ buffers/cache:       2807       5134
Swap:         8197         67       8130";
	break;

	case "/last":
		$msg = "root     pts/1        1.2.3.4   Sat Jan 28 13:05   still logged in   
root     pts/2        4.3.2.1   Fri Jan 27 13:48 - 16:36  (02:48)    
user1 pts/1        2.4.6.8   Fri Jan 27 13:29 - 16:03  (02:33)    
user2 pts/2        8.6.4.2   Thu Jan 26 11:49 - 18:43  (06:54)";
	break;

	case "/ls":
		$msg = "total 33M
drwxr-xr-x  2 root   root   4.0K Dec 21 12:56 dir1
-rw-r--r--  1 root   root   2.0K Mar 23  2015 file1.txt
-rw-r--r--  1 root   root   2.0K May 15  2015 file2.txt
drwxr-xr-x  2 root   root   4.0K Sep 13 21:22 dir2";
	break;	

	case "/ping":
		$msg = "PING google.com (1.2.3.4) 56(84) bytes of data.
64 bytes from site.net (1.2.3.4): icmp_seq=1 ttl=53 time=22.1 ms
64 bytes from site.net (1.2.3.4): icmp_seq=2 ttl=53 time=22.2 ms
64 bytes from site.net (1.2.3.4): icmp_seq=3 ttl=53 time=22.2 ms
64 bytes from site.net (1.2.3.4): icmp_seq=4 ttl=53 time=22.2 ms

--- google.com ping statistics ---
4 packets transmitted, 4 received, 0% packet loss, time 3000ms
rtt min/avg/max/mdev = 22.149/22.190/22.207/0.150 ms";
	break;		

	case "/ps":
		$msg = "user   555999 0.0  0.0   6064   608 ?        R    13:50   0:00 grep algun filtro";
	break;	

	case "/start" : 
		$msg = "Bienvenido a Linux Server Monitor";
	break;

	case "/top" : 
		$msg = "top - 13:52:15 up 477 days,  5:37,  1 user,  load average: 1.01, 1.05, 1.01
Tasks: 305 total,   3 running, 294 sleeping,   0 stopped,   8 zombie
Cpu(s):  7.1%us,  1.1%sy,  0.3%ni, 87.3%id,  4.1%wa,  0.0%hi,  0.1%si,  0.0%st
Mem:   8132104k total,  7381568k used,   750536k free,   394496k buffers
Swap:  8393952k total,    68784k used,  8325168k free,  3802276k cached

    PID USER      PR  NI  VIRT  RES  SHR S %CPU %MEM    TIME+  COMMAND          
 557983 mailnull  25   0  394m 321m 2528 R 98.9  4.0   0:05.14 clamscan         
 558067 root      20   0 10472  636  524 R  7.9  0.0   0:00.04 lsof             
 558077 user1     15   0  155m 9280 5876 S  4.0  0.1   0:00.02 php              
 528857 mailnull  15   0 71768 5644 1736 S  2.0  0.1   0:00.75 exim             
      1 root      15   0 10376  484  452 S  0.0  0.0   2:32.15 init             
      3 root      39  19     0    0    0 S  0.0  0.0   0:00.00 ksoftirqd/0";
	break;
	
	case "/uptime":
		$msg = "14:04:12 up 477 days,  5:49,  1 user,  load average: 1.36, 1.24, 1.11";
	break;

	case "/versions":
		$msg = "S.O.: CentOS release X.Y (Final) 2013-01-21 05:05:37
Apache: Server version: Apache/X.Y.Z (Unix)
PHP: X.Y.Z
MySQL: mysql  Ver X.Y Distrib A.B.C, for Linux (x86_64) using readline Z.X";
	break;

	case "/w":
		$msg = "14:05:42 up 477 days,  5:51,  1 user,  load average: 1.18, 1.20, 1.10
USER     TTY      FROM              LOGIN@   IDLE   JCPU   PCPU WHAT
root     pts/1    1.2.3.4   		13:05   26:19   0.01s  0.00s nano";
	break;

	case "/whois":
		$msg = "[Querying whois.verisign-grs.com]
[Redirected to whois.markmonitor.com]
[Querying whois.markmonitor.com]
[whois.markmonitor.com]
Domain Name: google.com
Registry Domain ID: 2138514_DOMAIN_COM-VRSN
Registrar WHOIS Server: whois.markmonitor.com
Registrar URL: http://www.markmonitor.com
Updated Date: 2015-06-12T10:38:52-0700
Creation Date: 1997-09-15T00:00:00-0700
Registrar Registration Expiration Date: 2020-09-13T21:00:00-0700
Registrar: MarkMonitor, Inc.
Registrar IANA ID: 292
Registrar Abuse Contact Email: abusecomplaints@markmonitor.com
Registrar Abuse Contact Phone: +1.2083895740
Domain Status: clientUpdateProhibited (https://www.icann.org/epp#clientUpdateProhibited)
Domain Status: clientTransferProhibited (https://www.icann.org/epp#clientTransferProhibited)
Domain Status: clientDeleteProhibited (https://www.icann.org/epp#clientDeleteProhibited)
Domain Status: serverUpdateProhibited (https://www.icann.org/epp#serverUpdateProhibited)
Domain Status: serverTransferProhibited (https://www.icann.org/epp#serverTransferProhibited)
Domain Status: serverDeleteProhibited (https://www.icann.org/epp#serverDeleteProhibited)
Registry Registrant ID: 
Registrant Name: Dns Admin
Registrant Organization: Google Inc.
Registrant Street: Please contact contact-admin@google.com, 1600 Amphitheatre Parkway
Registrant City: Mountain View
Registrant State/Province: CA
Registrant Postal Code: 94043
Registrant Country: US
Registrant Phone: +1.6502530000
Registrant Phone Ext: 
Registrant Fax: +1.6506188571
Registrant Fax Ext: 
Registrant Email: dns-admin@google.com
Registry Admin ID: 
Admin Name: DNS Admin
Admin Organization: Google Inc.
Admin Street: 1600 Amphitheatre Parkway
Admin City: Mountain View
Admin State/Province: CA
Admin Postal Code: 94043
Admin Country: US
Admin Phone: +1.6506234000
Admin Phone Ext: 
Admin Fax: +1.6506188571
Admin Fax Ext: 
Admin Email: dns-admin@google.com
Registry Tech ID: 
Tech Name: DNS Admin
Tech Organization: Google Inc.
Tech Street: 2400 E. Bayshore Pkwy
Tech City: Mountain View
Tech State/Province: CA
Tech Postal Code: 94043
Tech Country: US
Tech Phone: +1.6503300100
Tech Phone Ext: 
Tech Fax: +1.6506181499
Tech Fax Ext: 
Tech Email: dns-admin@google.com
Name Server: ns3.google.com
Name Server: ns2.google.com
Name Server: ns1.google.com
Name Server: ns4.google.com
DNSSEC: unsigned
URL of the ICANN WHOIS Data Problem Reporting System: http://wdprs.internic.net/
";
	break;

endswitch;

$msg.="\n
\nBlog: http://blog.angelinux-slack.net/2017/01/28/usar-un-bot-de-telegram-como-monitor-de-servidores-linux/
\nGithub: https://github.com/angelinux-slack/LinuxServerMonitorTelegramBot/blob/master/demo.php";

$sendto =API_URL."sendmessage?disable_web_page_preview=1&chat_id=".$chatID."&text=".urlencode($msg);
file_get_contents($sendto);

if ($chatID != "102703250"):
	//COPIA A MI
	$quien = $update["message"]["chat"]["first_name"]." ".$update["message"]["chat"]["last_name"]." ".$update["message"]["chat"]["username"]; 
	$sendto =API_URL."sendmessage?disable_web_page_preview=1&chat_id=-1001095067302&text=".urlencode("Demo: ".$msg."\n".$quien);
	file_get_contents($sendto);
endif;
?>
