#!/bin/bash
DATE=$(date +"%Y-%m-%d")
FILENAME="database-backup-$DATE.sql"

echo "Save data base on VM - 192.168.56.85"
mkdir -p /home/css/save/sql/
sudo mysqldump -h 192.168.56.84 -u css -pcsspass RDV_DATABASE > /home/css/save/sql/$FILENAME

echo "Backup recurrence - all 00:00"
guard_comment='# == my custom scheduler =='
sudo crontab -l > /tmp/crontab.txt
grep -qF "$guard_comment" /tmp/crontab.txt && exit 0
echo "$guard_comment" >>/tmp/crontab.txt
echo "0 0 * * * sudo /vagrant/script/backup_db.sh" >> /tmp/crontab.txt 
sudo crontab /tmp/crontab.txt 
rm /tmp/crontab.txt 