<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');

/*DEFINE SPECIFIC SETTING*/
// define('SITENAME','');
define('COMPANY','Unmer Malang');
define('APPSNAME','Starterku');
define('APPSVERSION','Beta v0.1');
define('DOMAIN','pasarumkm.id');
// define('DOMAIN','irigasi.roniwahyu.com');
define('TELPON','0341-364842');
define('EMAIL','roniwahyu@gmail.com');
define('ALAMAT','Jl. Borobudur No. 35<br>
Malang');
define('COMPANY_LONG',''); //longitude
define('COMPANY_LAT',''); //latitude
define('GA','');
define('THEMES','metronic'); //metronic | steller | default (BS4) | material (BS4)

// define('BASEURI',(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST']);
define('BASEURI',(isset($_SERVER['HTTPS']) ? "https://" : "http://") 
	. $_SERVER['SERVER_NAME'] 
	. str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

define('ASSETSURI',(isset($_SERVER['HTTPS']) ? "https://" : "http://") 
	.DOMAIN."/assets/");
define('ASSETSMAPS',(isset($_SERVER['HTTPS']) ? "https://" : "http://") 
	.DOMAIN."/assetsx/");

/*BNI CLIENT ID*/

/*GOOGLE DEV*/
//from api credential syahroni wahyu umkm2020 pasarumkmcom
define('JSON_KEY',BASEURI.'credentials/.json'); //direktori credentials json
define('API_KEY', ''); //from syahroni@widyagama.ac.id umkm2020 
define('CLIENT_ID', '');
define('CLIENT_SECRET', '');
define('OAUTH_CALLBACK_URI',BASEURI.'googleauth/oauth2callback');
define('OAUTH_TEST_URI',BASEURI.'googleauth/oauth2callback');

/*GOOGLE RECAPTCHA*/
//syahroni wahyu recaptcha pasarumkm
define('SITE_KEY', '');
define('SECRET_KEY', '');
define('RECAPTCHA_LANG', 'en');



/*SECURITY IS MATTER*/
define('SALT', '!!@B15m1ll4H_@rrahM4n_Arr4H1m!*#');
define('CSRF', TRUE);
define('XSS', TRUE);
define('SESSID','irigasi');


define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','pasarumkmcom');
define('DBDRIVER','mysqli'); //mysqli,sqlsrv

//AWS S3 CONFIGURATION
define('S3FOLDER','files-webapps/');
define('S3ACCESS','AKIA2XSK75SHMFV3XNLY');
define('S3SECRET','5UwaMMAPCEPReSZFA2ErBgT9e6KYXVXbumuVyhY');
define('S3BUCKETNAME','roniwahyucom');
define('S3BUCKETURL','https://roniwahyucom.s3.amazonaws.com');

         ?>