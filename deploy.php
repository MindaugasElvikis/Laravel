<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'My BTA Application');

// Project repository
set('repository', 'git@github.com:MindaugasElvikis/Laravel.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

inventory('deploy-hosts.yml');
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

