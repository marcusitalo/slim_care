<?php
//$dbconfig[ Environment or connection name] = array(Host, Database, User, Password, DB Driver, Make Persistent Connection?);
/**
 * Database settings are case sensitive.
 * To set collation and charset of the db connection, use the key "collate" and "charset"
 * array("localhost", "database", "root", "1234", "mysql", true, "collate"=>"utf8_unicode_ci", "charset"=>"utf8"); 
  databases.000webhost.com
 */

$dbconfig["dev"] = array("mysqldb", "consultorio", "root", "12345", "mysql", false, "public");
$dbconfig["prod"] = array("mysqldb", "consultorio", "root", "12345", "mysql", false, "public");

// $dbconfig["dev"] = array("localhost", "506547", "506547", 'Fr33W3bH0571ng', "mysql", false, "public");
// $dbconfig["prod"] = array("localhost", "506547", "506547", 'Fr33W3bH0571ng', "mysql", false, "public");
