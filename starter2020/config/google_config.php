<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['google_client_id']=CLIENT_ID;
$config['google_client_secret']=CLIENT_SECRET;
// $config['google_redirect_url']=base_url().'googleauth/oauth2callback';
$config['google_redirect_url']=OAUTH_CALLBACK_URI;
$config['google_redirect_url_test']=OAUTH_TEST_URI;

