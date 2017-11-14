<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'deployerdemo');

// Project repository
set('repository', 'git@github.com:overint/deployer-demo.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('45.77.233.72')
    ->user('root')
    ->stage('prod')
    ->set('deploy_path', '/var/www/html');
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

