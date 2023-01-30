#!/bin/bash
APT_OPT="-o Dpkg::Progress-Fancy="0" -q -y"
apt-get install $APT_OPT \
  apache2 \

sudo apt-get install libapache2-mod-proxy-html
sudo a2enmod proxy proxy_http proxy_ajp proxy_balancer lbmethod_byrequests
sudo systemctl restart apache2

# Configurer le cluster de répartition de charge
echo "
<VirtualHost *:80>
    <Proxy balancer://mycluster>
      BalancerMember http://192.168.56.81:80
      BalancerMember http://192.168.56.82:80 
    </Proxy>
    ProxyPreserveHost On
    ProxyPass / balancer://mycluster/
    ProxyPassReverse / balancer://mycluster/
</VirtualHost>
" > /etc/apache2/sites-available/example.com.conf

# Désactiver le VirtualHost par défaut et activer celui configuré
a2dissite 000-default.conf
a2ensite example.com.conf

# Redémarrer Apache pour appliquer les modifications
systemctl restart apache2
