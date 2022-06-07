<?php

// require MYSQL Connection
require ('database/DBController.php');

// require unit class
// require ('database/Unit.php');

require ('database/Table.php');
// require ('classes/signup-classes.php');

// DBController object
$db = new DBController();

//unit object
$table = new Table($db);

// $signup = new Signup($db);