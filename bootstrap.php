<?php

use Core\App;
use Core\Container;
use Core\Database;

date_default_timezone_set('Asia/Gaza');

$container = new Container();

$container->bind('Core\Database', function() {
    $config = require base_path("config.php");
    
    return new Database($config['database']);

});

require base_path('Core/Helpers/HelperCourse.php');
require base_path('Core/Helpers/HelperImage.php');
require base_path('Core/Helpers/HelperRole.php');



App::setContainer($container);

// $db = App::getContainer()->resolve('Core\Database');

