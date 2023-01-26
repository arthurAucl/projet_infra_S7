#!/bin/bash
openssl req -x509 -newkey rsa:4096 -keyout rendezvous.eseo.com.key -out rendezvous.eseo.com.crt -days 365 -nodes -subj "/CN=rendezvous.eseo.com"
# Récupérer les arguments passés au script
CRT_FILE=$1
KEY_FILE=$2

# Copier le certificat et la clé privée dans le répertoire approprié
sudo cp $CRT_FILE /etc/ssl/certs
sudo cp $KEY_FILE /etc/ssl/private

# Configurer Apache ou Nginx pour utiliser le certificat et la clé privée
sudo sed -i "s|SSLCertificateFile.*|SSLCertificateFile /etc/ssl/certs/$CRT_FILE|" /etc/apache2/apache2.conf
sudo sed -i "s|SSLCertificateKeyFile.*|SSLCertificateKeyFile /etc/ssl/private/$KEY_FILE|" /etc/apache2/apache2.conf

# Redémarrer Apache ou Nginx pour prendre en compte les modifications
sudo service apache2 restart