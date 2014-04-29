<?php
// Debitoor API Class
// Code by Daniel Roizer - http://thatblogger.co
// v2.0

define(req_code, "REQUEST_CODE");
define(clientID, "CLIENT_ID");
define(clientSecret, "SECRET_KEY");
define(token, "TOKEN_FROM_API");
define(apiURL, "https://app.debitoor.com/api/v1.0/");

require_once("debitoorapi.class.php");
require_once("debitoor.class.php");

$debitoor = new Debitoor();

// Get list of clients as an array()
print_r($debitoor->GetCustomers());

// Get list of products as an array()
print_r($debitoor->GetProducts());

// Add a client
print_r($debitoor->AddClient($name, $address, $phone, $email, $homepage, $cinumber, $vatnumber, $countrycode));