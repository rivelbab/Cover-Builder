<?php

// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', '/Cover-Builder/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'coverbuilder');
define('DB_USER', 'rivelson');
define('DB_PASS', 'rivelson');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
