@setup
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
@endsetup

@servers(['prod' => [env('DEPLOY_USER') . '@' . env('DEPLOY_HOST')]])

@task('horizon:restart', ['on' => 'prod'])
cd {{ env('DEPLOY_LOCATION') }}
{{ env('DEPLOY_PHP') }} artisan horizon:terminate
@endtask

@task('test', ['on' => 'prod'])
cd {{ env('DEPLOY_LOCATION') }}
{{ env('DEPLOY_PHP') }} artisan --version
@endtask
