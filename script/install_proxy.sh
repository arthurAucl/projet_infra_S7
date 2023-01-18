#!/bin/bash
APT_OPT="-o Dpkg::Progress-Fancy="0" -q -y"
apt-get install $APT_OPT \
  apache2 \

a2enmod proxy
a2enmod proxy_http

echo "
<VirtualHost *:80>
    ProxyPreserveHost On
    ProxyPass / http://192.168.56.81:80/
    ProxyPassReverse / http://192.168.56.81:80/
</VirtualHost>
" > /etc/apache2/sites-available/example.com.conf

a2dissite 000-default.conf
a2ensite example.com.conf
systemctl restart apache2