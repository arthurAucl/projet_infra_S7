IP=$(hostname -I | awk '{print $2}')
APT_OPT="-o Dpkg::Progress-Fancy="0" -q -y"
LOG_FILE="/vagrant/logs/install_db.log"

echo "START - Install DB - " $IP

echo "Install Maraidb" 
apt-get install -o Dpkg::Progress-Fancy="0" -q -y \
	mariadb-server \
	mariadb-client \
	>> $LOG_FILE 2>&1 


#mysql_secure_installation
