##################################################
# Generated by phansible.com
##################################################

Vagrant.require_version ">= 1.5"

# Check to determine whether we're on a windows or linux/os-x host,
# later on we use this to launch ansible in the supported way
# source: https://stackoverflow.com/questions/2108727/which-in-ruby-checking-if-program-exists-in-path-from-ruby
def which(cmd)
    exts = ENV['PATHEXT'] ? ENV['PATHEXT'].split(';') : ['']
    ENV['PATH'].split(File::PATH_SEPARATOR).each do |path|
        exts.each { |ext|
            exe = File.join(path, "#{cmd}#{ext}")
            return exe if File.executable? exe
        }
    end
    return nil
end

ansible_dir = 'ansible'
galaxy_roles_file = "#{ansible_dir}/galaxy_roles.yml"

def require_plugin(name)
  unless Vagrant.has_plugin?(name)
    puts <<-EOT.strip
      #{name} plugin required. Please run: "vagrant plugin install #{name}"
    EOT
    exit
  end
end

require_plugin 'vagrant-hostmanager'
require_plugin 'vagrant-host-shell'

Vagrant.configure("2") do |config|

    config.vm.provider :virtualbox do |v|
        v.name = "symfony"
        v.customize [
            "modifyvm", :id,
            "--name", "symfony",
            "--memory", 1024,
            "--natdnshostresolver1", "on",
            "--cpus", 1,
        ]
    end

    config.vm.box = "ubuntu/trusty64"
    
    config.hostmanager.ip_resolver = proc do |vm, resolving_vm|
        if hostname = (vm.ssh_info && vm.ssh_info[:host])
            `vagrant ssh -c "hostname -I"`.split()[1]
        end
    end

    config.vm.network :private_network, type: "dhcp"
    config.ssh.forward_agent = true

    #############################################################
    # Ansible provisioning (you need to have ansible installed)
    #############################################################

    
    if which('ansible-playbook')
        # Handle ansible galaxy roles
        if File.exist?("#{galaxy_roles_file}")
          config.vm.provision :host_shell do |host_shell|
              host_shell.inline = "ansible-galaxy install -r #{galaxy_roles_file} -p #{ansible_dir}/roles/galaxy -f"
          end
        end
        config.vm.provision "ansible" do |ansible|
            ansible.playbook = "ansible/playbook.yml"
            ansible.limit = 'symfony'
            ansible.groups = {"vagrant" => ["symfony"] }
        end
    else
        config.vm.provision :shell, path: "ansible/windows.sh", args: ["symfony.vagrant"]
    end

    config.vm.synced_folder(
        ".", "/vagrant",
        type: "nfs",
        nfs_udp: true,
        nfs_version: 3
    )

	config.hostmanager.enabled = true
	config.hostmanager.manage_host = true
	config.hostmanager.ignore_private_ip = false
	config.hostmanager.include_offline = true
	config.vm.define 'symfony' do |node|
	    node.vm.hostname = 'symfony.vagrant'
    	node.hostmanager.aliases = %w(symfony.vagrant)
	end

end
