# LinuxServerMonitorTelegramBot
Monitor your Linux Server on Telegram with this bot

With this bot for telegram you can monitor your Linux server.
Tested in 
- CentOS 5x
- CentOS 6x

#Installation
- Download server.php
- Chat in Telegram with @botFather and create a new bot
- Get your token key
- Rename demo.php to another name
- In php file, line 7, change (token) for your token
- Upload to your server with SSL support
- Set webhook in: https://api.telegram.org/bot(token)/setwebhook?url=https://(yourDomain/yourFile.php)
- Add following lines to /etc/sudoers, where username is your account name's domain:
- username  ALL = NOPASSWD: /usr/sbin/csf
- username  ALL = NOPASSWD: /scripts/cphulkdwhitelist
- username  ALL = NOPASSWD: /bin/grep
- username  ALL = NOPASSWD: /bin/ls
- username  ALL = NOPASSWD: /bin/ping
- username  ALL = NOPASSWD: /usr/bin/top
- username  ALL = NOPASSWD: /usr/bin/whois
- Open conversation in Telegram with your bot searching @yourBotName
- Enjoy

#Commands
/apacheerrorlog - show last Apache error log

/eximsendmaillog - show exim sender's path and count

/firewall - add IP to CSF and cpHulk whitelist (CSF, cPanel required)

/free - show free memory in MB

/last - Show last 20 system login, ip date

/ls - list a directory content

/ping - ping to IP or domain

/ps - show process with filter

/top - show system top process

/uptime - show server uptima

/versions - show OS, apache, PHP and MySQL versions

/w - show who is connected to server

/whois - show domains info
