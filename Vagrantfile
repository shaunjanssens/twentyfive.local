require 'json'
require 'yaml'

VAGRANTFILE_API_VERSION ||= "2"
confDir = $confDir ||= File.expand_path("vendor/gdmgent/artestead", File.dirname(__FILE__))

homesteadYamlPath = "Artestead.yaml"
homesteadJsonPath = "Artestead.json"
afterScriptPath = "after.sh"
aliasesPath = "aliases.sh"

require File.expand_path(confDir + '/scripts/artestead.rb')

Vagrant.require_version '>= 1.8.5'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    if File.exists? aliasesPath then
        config.vm.provision "file", source: aliasesPath, destination: "~/.bash_aliases"
    end

    if File.exists? homesteadYamlPath then
        settings = YAML::load(File.read(homesteadYamlPath))
    elsif File.exists? homesteadJsonPath then
        settings = JSON.parse(File.read(homesteadJsonPath))
    end

    Artestead.configure(config, settings)

    if File.exists? afterScriptPath then
        config.vm.provision "shell", path: afterScriptPath, privileged: false
    end

    if defined? VagrantPlugins::HostsUpdater
        config.hostsupdater.aliases = settings['sites'].map { |site| site['map'] }
    end
end
