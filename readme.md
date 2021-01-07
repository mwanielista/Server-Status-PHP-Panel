# Server status panel PHP app 

Web app that shows the status of servers.

# How it works?
There are three modules of this app: 
- First one is a web Panel - it retrieves information from the databse about servers status. 
- Second one is PHP script on physical servers - It is launched every three minutes by the crontab and sends info to database that the server is running.
- The third one is working on VPS server - it is launched every 3 minutes also via cron, but in PHP a 30 second delay has been added. If there is no records from a current minute in database, it change server status to stopped and send email notification. 

Everything works on Ubuntu 19.10 and 20.04 LTS servers.
### Modules

- serverApp - Script to run on physical devices,
- VPSApp - script to run on VPS Server,
- webApp - web app which processes all informations,
- database - MySQL database config file. 


### Plugins

| Plugin | Link |Readme | 
| ------ | ------ |------|
| PHPMailer | https://github.com/PHPMailer/PHPMailer |Used in VPSApp to send email notifications|
|Bootstrap |https://getbootstrap.com/|Used to make webApp|

### Screenshoot 
![Screenshoot from web application](/screenshoot.png)


