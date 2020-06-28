VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # Use the same key for each machine
  config.ssh.insert_key = false

  config.vm.define "ws1" do |webservers|
    webservers.vm.box = "ubuntu/trusty64"
    webservers.vm.network "forwarded_port", guest: 80, host: 8081
    webservers.vm.network "forwarded_port", guest: 443, host: 8444
    webservers.vm.network "private_network", ip:"10.0.0.3",
        virtualbox__intnet: true
    webservers.vm.hostname= "ws1"
    webservers.vm.provision "ansible" do |ansible|
      ansible.playbook = "site.yml"
    end
  end
  config.vm.define "ws2" do |webservers|
    webservers.vm.box = "ubuntu/trusty64"
    webservers.vm.network "forwarded_port", guest: 80, host: 8082
    webservers.vm.network "forwarded_port", guest: 443, host: 8445
    webservers.vm.network "private_network", ip:"10.0.0.4",
        virtualbox__intnet: true
    webservers.vm.hostname= "ws2"
    webservers.vm.provision "ansible" do |ansible|
      ansible.playbook = "site.yml"
    end
  end
  config.vm.define "db1" do |db1|
    db1.vm.box = "ubuntu/trusty64"
    db1.vm.network "private_network", ip:"10.0.0.5",
	virtualbox__intnet: true
    db1.vm.hostname= "db1"
    db1.vm.provision "ansible" do |ansible|
	ansible.playbook = "site.yml"
    end
  end
  config.vm.define "lb1" do |lb1|
    lb1.vm.box = "hashicorp-vagrant/ubuntu-16.04"
    lb1.vm.network "forwarded_port", guest: 80, host: 8080
    lb1.vm.network "forwarded_port", guest: 443, host: 8443
    lb1.vm.network "private_network", ip:"10.0.0.6",
	virtualbox__intnet: true
    lb1.vm.hostname= "lb1"
    lb1.vm.provision "ansible" do |ansible|
      ansible.playbook = "lb.yml"
    end
  end
end

# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
#Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
#  config.vm.box = "ubuntu/trusty64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  # config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip:

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  # config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
  #   vb.gui = true
  #
  #   # Customize the amount of memory on the VM:
  #   vb.memory = "1024"
  # end
  #
  # View the documentation for the provider you are using for more
  # information on available options.

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  # config.vm.provision "shell", inline: <<-SHELL
  #   apt-get update
  #   apt-get install -y apache2
  # SHELL
#end