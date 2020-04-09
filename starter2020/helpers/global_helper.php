<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('userid')){ 
    function userid(){ 
        $ci = & get_instance();  //get instance, access the CI superobject 
        $userid=$ci->session->userdata('user_id'); 
        // print_r($userid); 
        return($userid); 
    } 
} 

if(!function_exists('getuser')){ 
    function getuser(){ 
        $ci=& get_instance(); 
        if ($ci->ion_auth->logged_in()): 
            $user = $ci->ion_auth->user()->row(); 
            if (!empty($user)): 
                // $userid=$user->id; 
                // return $userid; 
                return $user; 
            else: 
                return array(); 
            endif; 
        endif; 
    } 
} 

if ( ! function_exists('enkrip')){ 
    function enkrip($text){ 
        $ci = & get_instance();  //get instance, access the CI superobject 
        // $userid=$ci->session->userdata('user_id'); 
        $enkrip= $ci->encrypt->encode($text); 
        // $edit = $this->encrypt->encode("edit"); 
        // print_r($userid); 
        return($enkrip); 
    } 
} 
if ( ! function_exists('dekrip')){ 
    function dekrip($text){ 
        $ci = & get_instance();  //get instance, access the CI superobject 
        // $userid=$ci->session->userdata('user_id'); 
        $dekrip= $ci->encrypt->decode($text); 
        // $edit = $this->encrypt->encode("edit"); 
        // print_r($userid); 
        return($dekrip); 
    } 
}  
if ( ! function_exists('encodeuri')){ 
    function encodeuri($string, $key="", $url_safe=TRUE) 
    { 
        if($key==null || $key=="") 
        { 
            $key="tyz_mydefaulturlencryption"; 
        } 
          $CI =& get_instance(); 
        $ret = $CI->encrypt->encode($string, $key); 
 
        if ($url_safe) 
        { 
            $ret = strtr( 
                    $ret, 
                    array( 
                        '+' => '.', 
                        '=' => '-', 
                        '/' => '~' 
                    ) 
                ); 
        } 
 
        return $ret; 
    } 
} 
if ( ! function_exists('decodeuri')){ 
    function decodeuri($string, $key="") 
    { 
         if($key==null || $key=="") 
        { 
            $key="tyz_mydefaulturlencryption"; 
        } 
            $CI =& get_instance(); 
        $string = strtr( 
                $string, 
                array( 
                    '.' => '+', 
                    '-' => '=', 
                    '~' => '/' 
                ) 
            ); 
 
        return $CI->encrypt->decode($string, $key); 
    } 
} 
if(!function_exists('safe_b64encode')){ 
    function safe_b64encode($string) { 
     
        $data = base64_encode($string); 
        $data = str_replace(array('+','/','='),array('-','_',''),$data); 
        return $data; 
    } 
}  
if(!function_exists('safe_b64decode')){ 
    function safe_b64decode($string) { 
        $data = str_replace(array('-','_'),array('+','/'),$string); 
        $mod4 = strlen($data) % 4; 
        if ($mod4) { 
            $data .= substr('====', $mod4); 
        } 
        return base64_decode($data); 
    } 
}     
if(!function_exists('encode64')){ 
    function encode64($value){  
        $ci =& get_instance(); 
        if(!$value){return false;} 
        $text = $value; 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB); 
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND); 
        // $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv); 
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $ci->config->item('encryption_key'), $text, MCRYPT_MODE_ECB, $iv); 
        return trim(safe_b64encode($crypttext));  
} } 
     
if(!function_exists('decode64')){ 
    function decode64($value){ 
        $ci =& get_instance(); 
        if(!$value){return false;} 
        $crypttext = safe_b64decode($value);  
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB); 
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND); 
        // $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv); 
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$ci->config->item('encryption_key'), $crypttext, MCRYPT_MODE_ECB, $iv); 
        return trim($decrypttext); 
}} 
if ( ! function_exists('now')){ 
    function now(){ 
        $now=date('Y-m-d H:i:s'); 
        return($now); 
    } 
}     


if(!function_exists('genweek')): 
    function genweek($date){ 
        return ( dateRange( $date, NOW(),'+1 week') ); 
    } 
endif; 
if(!function_exists('gendate')): 
    function gendate($date){ 
        return ( dateRange( $date, NOW(),'+1 day') ); 
    } 
endif; 
if(!function_exists('genmonth')): 
    function genmonth($date){ 
        return ( dateRange( $date, NOW(),'+1 day') ); 
    } 
endif; 
if(!function_exists('dateRange')): 
    function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) { 
 
        $dates = array(); 
        $current = strtotime( $first ); 
        $last = strtotime( $last ); 
        $i=1; 
        // while( ($current <= $last)  && ($i<=(84)*7) ) { 
        while( ($current <= $last)) { 
 
            $dates[] = date( $format, $current ); 
            $current = strtotime( $step, $current ); 
            $i++; 
        } 
 
        return $dates; 
    } 
endif; 

?>