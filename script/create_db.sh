

echo "Create DB" 

mysql -e "CREATE USER IF NOT EXISTS 'css'@'localhost' IDENTIFIED BY 'csspass'";
mysql -e "GRANT ALL ON *.* TO 'css'@'%' IDENTIFIED BY 'csspass' WITH GRANT OPTION";
mysql -e "GRANT ALL PRIVILEGES ON RDV_DATABASE.* TO 'css'@'localhost'";

DBFILE="/vagrant/data/sql/creation_db_rdv.sql"

if [ -f "$DBFILE" ] ;then
    mysql < $DBFILE 
else 
    echo "file not found"
fi
