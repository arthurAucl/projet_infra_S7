# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  #Server web
  config.vm.define "srv-web" do |machine|

    machine.vm.hostname = "srv-web"
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.network :private_network, ip: "192.168.56.80"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "srv-web"]
      v.customize ["modifyvm", :id, "--groups", "/projet_ld_css"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
      v.customize ["modifyvm", :id, "--natdnsproxy1", "off"]
    end
    config.vm.provision "shell", inline: <<-SHELL
      sed -i 's/ChallengeResponseAuthentication no/ChallengeResponseAuthentication yes/g' /etc/ssh/sshd_config    
      sleep 3
      service ssh restart
    SHELL
    machine.vm.provision "shell", path: "scripts/install_sys.sh"
    machine.vm.provision "shell", path: "scripts/install_web.sh"
    machine.vm.provision "shell", path: "scripts/install_bdd.sh"
    machine.vm.provision "shell", path: "scripts/install_moodle.sh"
    machine.vm.provision "shell", path: "scripts/install_myadmin.sh"
  end

  #Server data base
  config.vm.define "srv-database" do |machine|
    machine.vm.hostname = "srv-database"
    machine.vm.box = "chavinje/fr-bull-64"
    machine.vm.network :private_network, ip: "192.168.56.81"

    machine.vm.provider :virtualbox do |v|
      v.customize ["modifyvm", :id, "--name", "srv-database"]
      v.customize ["modifyvm", :id, "--groups", "/projet_ld_css"]
      v.customize ["modifyvm", :id, "--cpus", "1"]
      v.customize ["modifyvm", :id, "--memory", 1024]
      v.customize ["modifyvm", :id, "--natdnshostresolver1", "off"]
      v.customize ["modifyvm", :id, "--natdnsproxy1", "off"]
    end
  end
end


