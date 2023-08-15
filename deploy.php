<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/lsouzapedroso/front-guide.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('192.168.55.1')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/front-guide');

// Hooks

after('deploy:failed', 'deploy:unlock');
