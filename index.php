<?php
require_once "vendor/autoload.php";

use OrionApi\Core\App;
use OrionApi\Core\Http\Router;
use OrionApi\Data\DbConfig;
use OrionApi\Data\DbConnection;
use OrionApi\Data\OrionRepository;

$dbconfig = new DbConfig("localhost",3306,"mysql","shyam","Pass@123", "familytree");

$dbconnection = new DbConnection($dbconfig);

$app = new App;

$pdo = $dbconnection->get_connection();

$repo = new OrionRepository($pdo);

$res = $repo->query("show tables");

print_r($res);


Router::get("/", ["hello"=>"world"]);


$app->start();



