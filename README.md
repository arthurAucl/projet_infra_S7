# Infrastructure project

## Pre-requisits

* Oracle Virtualbox (version 6.1) (<https://www.virtualbox.org/wiki/Downloads>)
* Oracle VM VirtualBox Extension Pack 
* HashiCorp Vagrant (<https://www.vagrantup.com/>)


### Download files 

#### Devops work
* Download the ops branch

```bash
cd /home/user/project
git clone https://github.com/arthurAucl/projet_infra_S7.git
git checkout origin/ops
```

#### Devops + developper work
```bash
cd /home/user/project
git clone https://github.com/arthurAucl/projet_infra_S7.git
```

## Description 

This infrastructure consists in : 
* 2 virtual machines that are dedicated to web serving. 
* 1 virtual machine for the proxy, which distributes http requests on both web machines. 
* 1 virtual machine as a database server
* 1  virtual machine for the database backups

* Proxy : http://192.168.56.80/
* Web Server : http://192.168.56.81/ and http://192.168.56.82/
* Database : IP 192.168.56.84 
* Backup : IP 192.168.56.85

## How to use this system 

* Startup system : 

```bash
cd /home/user/project
vagrant up
```

* Shutdown system

```bash
cd /home/user/project
vagrant halt
```

* Destroy the system 

```bash
cd /home/user/project
vagrant destroy
```

## How to test the system is working in ops branch

```bash
cd /home/user/project
vagrant up

# Test database is properly installed
# Go on 192.168.56.80, 192.168.56.81 or 192.168.56.82
# You will see the data base. 
```
### Change the database and check it again
```bash
cd /home/user/project
vagrant ssh db-srv
mysql -h 192.168.56.84 -u css -pcsspass RDV_DATABASE
```
```sql
INSERT INTO utilisateurs (nom, prenom, email, motdepasse, etat) VALUES ( 'Lastname', 'Fisrtname', 'Fisrtname.Lastname@reseau.eseo.fr', 'network', 'ETUDIANT');
```
Now you can check again IP 192.168.56.80