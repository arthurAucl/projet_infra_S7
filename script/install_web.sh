IP=$(hostname -I | awk '{print $2}')
APT_OPT="-o Dpkg::Progress-Fancy="0" -q -y"
LOG_FILE="/vagrant/logs/install_web.log"

echo "START - Install web - " $IP

apt-get install $APT_OPT \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
    php-intl \
    php-curl \
    php-xmlrpc \
    php-soap \
    php-gd \
    php-json \
    php-cli \
    php-pear \
    php-xsl \
    php-zip \
    php-mbstring \
    php-mysqli \
    >> $LOG_FILE 2>&1

echo "Restarting Apache..."
service apache2 restart
