# LinuxServerMonitorTelegramBot
Monitor your Linux Server on Telegram with this bot

With this bot for telegram you can monitor your Linux server.
Tested in 
- CentOS 5x
- CentOS 6x

#Commands
/apacheerrorlog - show last Apache error log

/eximsendmaillog - show exim sender's path and count

/firewall - add IP to CSF and cpHulk whitelist (CSF, cPanel required)

/free - show free space in MB

/last - Show last 20 system login, ip date

/ls - list a directory content

/ping - ping to IP or domain

/ps - show process with filter

/top - show system top process

/uptime - show server uptima

/versions - show OS, apache, PHP and MySQL versions

/w - show who is connected to server

/whois - show domains info

#For root commands you need edit /etc/sudoers:
username  ALL = NOPASSWD: /usr/sbin/csf

username  ALL = NOPASSWD: /scripts/cphulkdwhitelist

username  ALL = NOPASSWD: /bin/grep

username  ALL = NOPASSWD: /bin/ls

username  ALL = NOPASSWD: /bin/ping

username  ALL = NOPASSWD: /usr/bin/top

username  ALL = NOPASSWD: /usr/bin/whois

where username is the name of user account where you upload php file
