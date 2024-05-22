<?php




function active($menu)
{
		$ci=get_instance();
		if($ci->uri->segment(2)==$menu){
			echo "active";
		}
}


function postvalue($name)
{
	$ci=get_instance();
	return $ci->input->post($name,true);
}

function imageupload($name,$path,$param)
{
	$ci=get_instance();
	
	$config['upload_path']='assets/upload/'.$path.'/';
	 $config['allowed_types']=$param;

	$ci->upload->initialize($config);

    if($ci->upload->do_upload($name))
    {
    	
    	$image=$ci->upload->data();
    	return $config['upload_path'].$image['file_name'];
    }

    return null;
}



function flash($type,$icon,$title,$message=null)
{
			$ci=get_instance();
	         $message='<div class="alert alert-'.$type.' alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h4 class = "h6"><i class="icon fa fa-'.$icon.'"></i> '.$title.'</h4>'.$message.'
           </div>';
           $ci->session->set_flashdata('flashmessage',$message);
}


function flashread()
{
	$ci=get_instance();
	echo $ci->session->flashdata('flashmessage');
}

function back()
{
	return redirect($_SERVER['HTTP_REFERER']);
}




//ekleme helpere
function ispost()
{
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		return true;
	}
}


function deletebutton($table,$id)
{
	$ci=get_instance();
	if($ci->session->userdata('deletefunction'))
	{
	echo '<a href="'.base_url('user/delete/'.$table.'/'.$id).'" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-remove"></i> Delete</a>';
	}
}

function deletebutton2($table,$id)
{
	$ci=get_instance();
	if($ci->session->userdata('deletefunction2'))
	{
	echo '<a href="'.base_url('uyeislemleri/sil/'.$table.'/'.$id).'" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-remove"></i> Delete</a>';
	}
}




function sef($text) {
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}

