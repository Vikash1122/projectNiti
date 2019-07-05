<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
        'displayErrorDetails' => (getenv('APP_ENV')=='local')?true:false,
        'app_env'=>getenv('APP_ENV'),
        'host'=>getenv('APP_HOST'),

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'db' => [
            'driver' => getenv('DB_CONNECTION'),
            'host' => getenv('localhost'),
            'database' => getenv('nittygritty'),
            'username' => getenv('root'),
            'password' => getenv('root'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'upload_dir'=>__DIR__.'/../../../truxAI/storage/app',
        'upload_url'=>  getenv('APP_URL').'/public/storage',
    ],
];
