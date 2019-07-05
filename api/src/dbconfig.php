<?php
print_r(__DIR__);die();
     $dotenv = new Dotenv\Dotenv(__DIR__.'/../../','.env');
    
    echo "hello";die();
    $dotenv->load() ;
    $settings = require __DIR__ . '/../src/settings.php';

    



    


