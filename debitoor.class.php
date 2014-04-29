<?php
// Debitoor Class to send requests to the API
// Code by Daniel Roizer - http://thatblogger.co
// v2.0

if(!class_exists('Debitoor')){
class Debitoor {

	public function GetProducts(){
		// GET PRODUCTS
		$apihelp = new DebitoorApiHelper();
		return $apihelp->createApiCall("products", 'GET', NULL, NULL);
	}
	
	public function GetCustomers(){
		// GET CUSTOMERS
		$apihelp = new DebitoorApiHelper();
		return $apihelp->createApiCall("customers", 'GET', NULL, NULL);
	}
	
	public function GetCustomerID($id){
		// GET CUSTOMER BY ID
		$apihelp = new DebitoorApiHelper();
		return $apihelp->createApiCall("customers/".$id, 'GET', NULL, NULL);
	}
	
	
	public function GetCountries(){
		// GET CONTERIES
		$apihelp = new DebitoorApiHelper();
		return $apihelp->createApiCall("countries", 'GET', NULL, NULL);
	}
	
	
	public function AddClient($name, $address, $phone, $email, $homepage, $cinumber, $vatnumber, $countrycode){
		// ADD CLIENT
		$apihelp = new DebitoorApiHelper();
		return $apihelp->createApiCall("customers", 'POST', NULL, array(
				"id"						=>	NULL,
				"name"						=>	$name,
				"number"					=>	NULL,
				"address"					=>	$address,
				"phone"						=>	$phone,
				"email"						=>	$email,
				"homepage"					=>	$homepage,
				"ciNumber"					=>	$cinumber,
				"vatNumber"					=>	$vatnumber,
				"paymentTermsId"			=>	3,
				"customPaymentTermsDays"	=>	15,
				"countryCode"				=>	$countrycode,
				"countryName"				=>	NULL,
				"isArchived"				=>	NULL
				)
		);
	}
	
	public function EditClient($cid, $name, $address, $phone, $email, $homepage, $cinumber, $vatnumber, $countrycode){
		// EDIT CLIENT
		$apihelp = new DebitoorApiHelper();
		return $apihelp->createApiCall("customers/". $cid, 'PUT', NULL, array(
				"id"						=>	$cid,
				"name"						=>	$name,
				"number"					=>	NULL,
				"address"					=>	$address,
				"phone"						=>	$phone,
				"email"						=>	$email,
				"homepage"					=>	$homepage,
				"ciNumber"					=>	$cinumber,
				"vatNumber"					=>	$vatnumber,
				"paymentTermsId"			=>	3,
				"customPaymentTermsDays"	=>	15,
				"countryCode"				=>	$countrycode,
				"countryName"				=>	NULL,
				"isArchived"				=>	NULL
				)
		);
	}
	
}
}