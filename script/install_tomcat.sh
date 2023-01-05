#!/bin/bash

#Variables

TOMCAT_VERSION="9.0.40" # Remplacez par la version souhaitée
TOMCAT_FILE="apache-tomcat-${TOMCAT_VERSION}.tar.gz"
TOMCAT_URL="https://archive.apache.org/dist/tomcat/tomcat-9/v${TOMCAT_VERSION}/bin/${TOMCAT_FILE}"
TOMCAT_HOME="/opt/tomcat"
LOG_FILE="/vagrant/logs/install_tomcat.log"

echo "START - Install curl "
apt-get install -o Dpkg::Progress-Fancy="0" -q -y curl \
    default-jdk \
    >> $LOG_FILE 2>&1

#creer un user
groupadd tomcat
useradd -s /bin/false -g tomcat -d /opt/tomcat tomcat

#Téléchargement de Tomcat
echo "Install - Tomcat"
cd /tmp
wget "${TOMCAT_URL}" >> $LOG_FILE 2>&1

#Extraction de Tomcat
mkdir /opt/tomcat/common/lib
tar -xzvf "${TOMCAT_FILE}"  -C /opt/tomcat --strip-components=1 >> $LOG_FILE 2>&1

#Définition de la variable d'environnement CATALINA_HOME
echo "export CATALINA_HOME=${TOMCAT_HOME}" >> ~/.bashrc
source ~/.bashrc

#Install JDBC 
echo "Install JDBC"
cd /tmp
wget "https://cdn.mysql.com/archives/mysql-connector-java-5.1/mysql-connector-java-5.1.49.tar.gz" >> $LOG_FILE 2>&1
tar -xvzf mysql-connector-java-5.1.49.tar.gz -C ${CATALINA_HOME}/common/lib >> $LOG_FILE 2>&1

#Démarrage de Tomcat
"${TOMCAT_HOME}/bin/catalina.sh" start >> $LOG_FILE 2>&1

#Vérification de l'installation
if curl --output /dev/null --silent --head --fail "http://localhost:8080"; then
echo "Tomcat a été installé et démarré avec succès !"
else
echo "Une erreur est survenue lors de l'installation de Tomcat."
fi

javac /vagrant/script/test_java.java
