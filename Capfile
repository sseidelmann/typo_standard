set :deploy_config_path, 'dev/capistrano/deploy.rb'
set :stage_config_path, 'dev/capistrano/deploy'

require 'capistrano/setup'
require 'capistrano/deploy'
require 'capistrano/composer'

Dir.glob('dev/capistrano/tasks/wfp2/*.rake').each { |r| import r }
Dir.glob('dev/capistrano/tasks/custom/*.rake').each { |r| import r }