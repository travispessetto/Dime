<?php

function connection(){

    private $domain;
	private $username;
	private $password;
	private $cookieFile;
	private $connection;

	function __construct(){

	}
  
   function doAdminLogin($domain,$username,$password,$cookieFile){
		$fields_string = "";
		$connection = curl_init($domain);
	    curl_setopt ($connection, CURLOPT_COOKIEJAR, $cookieFile);
		curl_setopt ($connection, CURLOPT_RETURNTRANSFER, true);

		$fields = array('username'=>urlencode($username),'password'=>urlencode($password),'op'=>urlencode($option),'submit'=>urlencode($submit));

		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string,'&');

		curl_setopt($connection,CURLOPT_URL,$domain);
		curl_setopt($connection,CURLOPT_POST,count($fields));
		curl_setopt($connection,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt ($connection, CURLOPT_COOKIEFILE, $cookieFile);
		curl_setopt ($connection, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($connection);
   }

}