# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.define "web-srv" do |machine|
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.hostname = "web-srv"
    machine.vm.network :private_network, ip: "192.168.56.80"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "web-srv"]
      v.customize ["modifyvm", :id, "--groups", "/projet_S7"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
    end
    machine.vm.provision "shell", path: "script/install_sys.sh"
    machine.vm.provision "shell", path: "script/install_web.sh"
    machine.vm.synced_folder "./data/www/" , "/var/www/html/", create: true
  end

  config.vm.define "db-srv" do |machine|
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.hostname = "db-srv"
    machine.vm.network :private_network, ip: "192.168.56.81"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "db-srv"]
      v.customize ["modifyvm", :id, "--groups", "/projet_S7"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
    end
    machine.vm.provision "shell", path: "script/install_sys.sh"
    machine.vm.provision "shell", path: "script/install_db.sh"

    machine.vm.provision "shell", inline: "cp /vagrant/data/config/mariadb-server/my.cnf /etc/mysql/my.cnf"
    machine.vm.provision "shell", inline: "cp /vagrant/data/config/mariadb-server/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf"
    
    machine.vm.provision "shell", inline: "systemctl restart mariadb"
    machine.vm.provision "shell", path: "script/create_db.sh"
  end 
end
