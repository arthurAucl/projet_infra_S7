
LOG_FILE="/vagrant/logs/test_db.log"

echo "Create DB" 

mysql -e "CREATE USER IF NOT EXISTS 'css'@'localhost' IDENTIFIED BY 'csspass'";
mysql -e "GRANT ALL ON *.* TO 'css'@'%' IDENTIFIED BY 'csspass' WITH GRANT OPTION";

DBFILE="/vagrant/data/sql/creation_db_rdv.sql"

if [ -f "$DBFILE" ] ;then
    mysql < $DBFILE 
    >> $LOG_FILE 2>&1
else 
    echo "file not found"
fi
