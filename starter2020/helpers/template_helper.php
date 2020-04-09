<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('component'))
{
    function component($uri = '')
    {
        $CI =& get_instance();

        $component = $CI->config->item('themes_component');

        return $component . trim($uri, '/');
    }
}

if ( ! function_exists('themes_view'))
{
    function themes_view($uri = '')
    {
        $CI =& get_instance();

        $themes_view = $CI->config->item('themes_view');

        return $themes_view . trim($uri, '/');
    }
}

if ( ! function_exists('assets_url'))
{
    function assets_url($uri = '')
    {
        $CI =& get_instance();

        $assets_url = $CI->config->item('assets_url');

        return $assets_url . trim($uri, '/');
    }
}
if ( ! function_exists('vendors_url'))
{
    function vendors_url($uri = '')
    {
        $CI =& get_instance();

        $vendors_url = $CI->config->item('vendors_url');

        return $vendors_url . trim($uri, '/');
    }
}

if ( ! function_exists('themes_url'))
{
    function themes_url($uri = '')
    {
        $CI =& get_instance();

        $themes_url = $CI->config->item('themes_url');

        return $themes_url . trim($uri, '/');
    }
}

if ( ! function_exists('public_assets'))
{
    function public_assets($uri = '')
    {
        $CI =& get_instance();

        $public_assets = $CI->config->item('public_assets');

        return $public_assets . trim($uri, '/');
    }
}

//getcomponent
if ( ! function_exists('getcomponent')){
function getcomponent($component,$data=null,$state=false){
        $ci = & get_instance();
        return $ci->load->view((component($component)),$data,$state);
    }
}
// menghindari xss
function cetak($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}


// Gawane Generator
if(!function_exists('set_label'))
{
    function set_label($text = NULL)
    {
        if($text)
        {
            $label = preg_replace('/_id$/', '', $text);
            $label = str_replace('_', ' ', $label);
            $label = ucwords($label);
        }
        else
        {
            $label = '';
        }
        
        return $label;
    }

}

if(!function_exists('create_breadcrumb'))
{
    function create_breadcrumb()
    {
        $ci = &get_instance();
        $i=1;
        $uri = $ci->uri->segment($i);
        // <h3 class="kt-subheader__title">'.$uri.'</h3>
        $link = '<div class="kt-subheader__breadcrumbs">';
        // <ol class="breadcrumb">';
        
        while($uri != '')
        {
            $prep_link = '';
            
            for($j=1; $j<=$i;$j++)
            {
                $prep_link .= $ci->uri->segment($j).'/';
            }

            if($ci->uri->segment($i+1) == '')
            {
                //$link.='<li><a href="'.site_url($prep_link).'"><b>';
                // kt-subheader__breadcrumbs-link
                $link.='<span class="kt-subheader__breadcrumbs-separator"></span><strong>';
                $link.=set_label($ci->uri->segment($i) ).'</strong> ';
            }
            else
            {
                $link.='<a class="kt-subheader__breadcrumbs-home" href="'.site_url($prep_link).'"> <i class="flaticon2-shelter"></i> ';
                $link.= set_label($ci->uri->segment($i) ).'</a> ';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        
        $link .= '</div>';
        return $link;
    }
}
if(!function_exists('statusfy')){
    function statusfy($status='1',$string=null){
         switch ($status) {
             case '1':
                return (json_encode(array('st'=>$status,'msg'=>'<div class="alert alert-success">Sukses'.(!empty($string)?'<br/>'.$string:'').'</div>')));
                 # code...
                 break; 
            case '0':
                return (json_encode(array('st'=>$status,'msg'=>'<div class="alert alert-danger">Gagal '.(!empty($string)?'<br/>'.$string:'').'</div>')));
                 # code...
                 break;
             
             
         }
    }
}


if(!function_exists('notify'))
{
    function notify($msg,$type = 'info',$judul = '') 
    {
        $tpl = '';
        switch ($type)
        {
            case 'info' :
                $tpl  = '<div class="alert  alert-info fade">';
                $prefix = "Info";
                break;
            
            case 'success' :
                $tpl  = '<div class="alert  alert-success fade">';
                $prefix = "Sukses";
                break;
            
            case 'warning' :
                $tpl  = '<div class="alert  alert-warning fade">';
                $prefix = "Peringatan";
                break;
            
            case 'danger' :
                $tpl  = '<div class="alert  alert-danger fade">';
                $prefix = "Bahaya";
                break;
            default :
                 $tpl  = '<div class="alert  alert-info fade>';
                 $prefix = "Info";
                break;                
        }

        $tpl .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $tpl .= '<strong> '. (trim($judul) !='' ? ucwords($judul) : ucwords($prefix)) .'! </strong> ' . $msg;
        $tpl .= '<script>
                
                $(document).ready(function(){
                     $(".alert").delay(7500).addClass("in").fadeOut("slow");
                });
                
                </script>';
        $tpl .= '</div>';
        
        return $tpl;
    }
}

if(!function_exists('isactive')){ 
    function isactive($value){ 
        // $ci = & get_instance();  
        // $cicil=$ci->pmbdb->isapproveujian($value); 
       
            if($value=='1'){
                return "<a href='#' class='btn btn-primary btn-sm'>Aktif</a>"; 
            }else{
                return "<a href='#' class='btn btn-danger btn-sm'>Tidak Aktif</a>"; 
            }
    }
}
if(!function_exists('viewbtn')){
    function viewbtn($id,$remote=null,$target=null){
        if(!empty($remote)):
            // $remote=$data['remote'];
            // $target=$data['target'];
            return "<button data-load-remote='".$remote.$id."' data-target='".$target."' data-remote-target='".$target."  .modal-body' data-toggle='modal' type='button' id='".$id."' class='viewbtn btn-icon btn btn-sm btn-outline-primary btn-elevate btn-elevate-air'><i class='fa fa-eye'></i></button>";
        else:
            return "<button type='button' id='".$id."' class='viewbtn btn-icon btn btn-sm btn-outline-primary btn-elevate btn-elevate-air'><i class='fa fa-eye'></i></button>";

        endif;

    } 
}
if(!function_exists('editbtn')){
    function editbtn($id,$remote=null,$target=null){
        if(!empty($remote)):
            // $remote=$data['remote'];
            // $target=$data['target'];
            return "<button data-load-remote='".$remote.$id."' data-target='".$target."' data-remote-target='".$target."  .modal-body' data-toggle='modal' type='button' id='".$id."' class='viewbtn btn-icon btn btn-sm btn-outline-primary btn-elevate btn-elevate-air'><i class='fa fa-pencil-alt'></i></button>";
        else:
            
            return "<button type='button' id='".$id."' class='editbtn btn-icon btn btn-sm btn-outline-warning btn-elevate btn-elevate-air'><i class='fa fa-pencil-alt'></i></button>";
        endif;
    } 
}
if(!function_exists('delbtn')){
    function delbtn($id,$data=null){
        return "<button onclick='destroy(".$id.")' type='button' id='".$id."' class='delbtn btn-icon btn btn-sm btn-outline-danger btn-elevate btn-elevate-air'><i class='fa fa-trash-alt'></i></button>";
    } 
}
if(!function_exists('custombtn')){
    function custombtn($id,$link=null,$class=null,$icon=null){
        return "<a href='".$link."' id='".$id."' class='".$class."'><i class='".$icon."'></i></a>";
    } 
}
if(!function_exists('isactivebutton')){ 
    function isactivebutton($value,$id=null){ 
        // $ci = & get_instance();  
        // $cicil=$ci->pmbdb->isapproveujian($value); 
       
            if($value=='1'){
                return '<div class="btn-group">
  <button type="button" class="btn btn-primary btn-sm ">Aktif</button>
  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu red-bg text-center" role="menu">
    <li class="btn-sm"><a href="#" class="btn btn-danger btn-sm" onclick="deactivate('.$id.')"><i class="fa fa-power-off"></i> Non Aktifkan</a></li>

  </ul>
</div>'; 
            }else{
                return '<div class="btn-group">
  <button type="button" class="btn btn-danger btn-sm ">Tidak Aktif</button>
  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu navy-bg text-center" role="menu" >
    <li class="btn-sm" style="margin:0px"><a href="#" class="btn btn-primary btn-sm" onclick="activate('.$id.')"><i class="fa fa-power-off"></i> Aktifkan</a></li>

  </ul>
</div>'; 
            }
    }


} 



if ( ! function_exists('btnmodal')) { 
    function btnmodal($text,$id=null,$btnclass=null,$remote=null,$target=null){
         $ci = & get_instance();
    
        $html='<a  data-load-remote="'.$remote.'" data-remote-target="'.$target.'" class="btn '.$btnclass.'" data-toggle="modal" href="#'.$id.'">'.$text.'</a>';
        return $html;
    }
}
if ( ! function_exists('loadmodal')) { 
    function loadmodal($files,$id=null,$panel=null,$bg=null,$title=null,$tipe=null){
        $ci = & get_instance();
        $html=$ci->load->view($files,array(
                'id'=>$id,
                'panel'=>$panel,
                'panelbg'=>$bg,
                'paneltitle'=>$title,
                'tipe'=>$tipe,
            ),true);
        $ci->output->set_output($html);
    }

}

if ( ! function_exists('themodal')) { 
    function themodal($files,$text,$id=null,$panel=null,$bg=null,$title=null,$btnclass=null,$tipe=null,$remote=null,$target=null){
         $ci = & get_instance();
            $html='<button type="button" 
            data-load-remote="'.$remote.'" 
            data-remote-target="'.$target.'" 
            class="btn '.$btnclass.'" 
            data-toggle="modal" 
            data-target="#'.$id.'">'.$text.'</button>';

        // $html='<button data-load-remote="'.$remote.'" data-remote-target="'.$target.'" class="btn '.$btnclass.'" data-target="'.$id.'" data-toggle="modal" href="#'.$id.'">'.$text.'</button>';

    $ci->load->view($files,array(
        'id'=>$id,
        'panel'=>$panel,
        'panelbg'=>$bg,
        'paneltitle'=>$title,
        'tipe'=>$tipe,
    ));
    return $html; 
    } 
} 
if ( ! function_exists('buttonmodal')) { 
    function buttonmodal($text,$id=null,$panel=null,$bg=null,$title=null,$btnclass=null,$remote=null,$target=null){
         // $ci = & get_instance();
    
        $html='<a  data-load-remote="'.$remote.'" data-remote-target="'.$target.'" class="btn '.$btnclass.'" data-toggle="modal" href="#'.$id.'">'.$text.'</a>';
        return $html; 
    } 
} 
if ( ! function_exists('widget')) { 
    function widget($data){

        $html='<div class="'.$data['class'].'"><a href="'.$data['link'].'">
                <span class="kt-widget17__icon">
                <img style="width:32px;min-width: 20%" src="'.$data['icon'].'" class="img img-responsive">
                </span>
                <span class="kt-widget17__subtitle">
                   '.$data['title'].'
                </span>
                <span class="kt-widget17__desc">
                    '.$data['subs'].'
                </span></a>
            </div>';
        return $html;
    }
}
/* End of file template_helper.php */
/* Location: ./application/controllers/template_helper.php */ ?>