<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'localhost',
	'database' => 'ppem2l',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci'
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$capsule::connection()->enableQueryLog();