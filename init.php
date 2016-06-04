<?php

/*require "vendor/autoload.php";
   
   $ELSEARCH_SERVER = array("");
   $conn = array();
   $conn["hosts"] = $ELSEARCH_SERVER;
   
   $client = new Elasticsearch\Client($conn);
*/


require_once 'vendor/autoload.php';

$es = Elasticsearch\ClientBuilder::create()->build();

?>