<?php
/*
 * PANEL SETTINGS
 */


//Default system language
define(DEFAULT_LANG,"TR_tr");

//Default system language
define(PAGE_LIMIT,15);

/*
 * DATABASE SETTINGS
 */
//host
define(DBHOST,"localhost");


//user

define(DBUSER,"root");



//password 

define(DBPASS,"");



//database name

define(DBNAME,"pys");


//database table prefix
define(DBPREFIX,"");

//Connect database
$mysql = new db("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS, DBPREFIX );

