<?php

// Для выдачи ошибок
define("_EXECUTED", 1);

// Kickstart the framework
$f3=require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');

$f3->set('AUTOLOAD', 'autoload/');

$db = new DB\SQL('mysql:host=localhost;port=3306;dbname=slink21_mister',
				 'slink21_mister',
				 'Aqt5eNvX',
				 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET time_zone = \'+03:00\'',
					   PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET utf8',
					   PDO::ATTR_ERRMODE			=> PDO::ERRMODE_EXCEPTION) // Для обработки исключений при ошибках в запросах к бд
				 );

$f3->set('DB', $db);

$f3->config('routes.cfg');

$f3->run();
// check auto
