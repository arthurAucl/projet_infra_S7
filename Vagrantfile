# -*- mode: ruby -*-
# vi: set ft=ruby :

num_of_vms = 2
info_ip_executed = false 

Vagrant.configure("2") do |config|
  
  (1..num_of_vms).each do |i|
    config.vm.define "web-srv-#{i}" do |machine|
      machine.vm.box = "chavinje/fr-bull-64"
      machine.vm.hostname = "web-srv-#{i}"
      machine.vm.network :private_network, ip: "192.168.56.#{i+80}"

      machine.vm.provider :virtualbox do |v|
        v.customize ["modifyvm", :id, "--name", "web-srv-#{i}"]
        v.customize ["modifyvm", :id, "--groups", "/projet_S7"]
        v.customize ["modifyvm", :id, "--cpus", "1"]
        v.customize ["modifyvm", :id, "--memory", 1024]
        v.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
        v.customize ["modifyvm", :id, "--natdnsproxy1", "off"]
      end
      machine.vm.provision "shell", path: "script/install_sys.sh"
      machine.vm.provision "shell", path: "script/install_web.sh"
      
      machine.vm.synced_folder "./data/www/" , "/var/www/html/", create: true
    end
  end

  config.vm.define "db-srv" do |machine|
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.hostname = "db-srv"
    machine.vm.network :private_network, ip: "192.168.56.84"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "db-srv"]
      v.customize ["modifyvm", :id, "--groups", "/projet_S7"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
      v.customize ["modifyvm", :id, "--natdnsproxy1", "off"]
    end
    machine.vm.provision "shell", path: "script/install_sys.sh"
    machine.vm.provision "shell", path: "script/install_db.sh"

    machine.vm.provision "shell", inline: "cp /vagrant/data/config/mariadb-server/my.cnf /etc/mysql/my.cnf"
    machine.vm.provision "shell", inline: "cp /vagrant/data/config/mariadb-server/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf"

    machine.vm.provision "shell", inline: "systemctl restart mariadb"
    machine.vm.provision "shell", path: "script/create_db.sh"
  end 

  config.vm.define "proxy-srv" do |machine|
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.hostname = "proxy-srv"
    machine.vm.network :private_network, ip: "192.168.56.80"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "proxy-srv"]
      v.customize ["modifyvm", :id, "--groups", "/projet_S7"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
      v.customize ["modifyvm", :id, "--natdnsproxy1", "off"]

    end
    machine.vm.provision "shell", path: "script/install_sys.sh"
    machine.vm.provision "shell", path: "script/install_proxy.sh"
  end 

  config.vm.define "backup-srv" do |machine|
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.hostname = "backup-srv"
    machine.vm.network :private_network, ip: "192.168.56.85"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "backup-srv"]
      v.customize ["modifyvm", :id, "--groups", "/projet_S7"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
      v.customize ["modifyvm", :id, "--natdnsproxy1", "off"]
    end
    machine.vm.provision "shell", path: "script/install_sys.sh"
    machine.vm.provision "shell", path: "script/install_db.sh"
    machine.vm.provision "shell", path: "script/backup_db.sh"
  end 
  
  if !info_ip_executed
    config.vm.provision "shell", path: "script/info_ip.sh"
    info_ip_executed = true 
  end 
end
