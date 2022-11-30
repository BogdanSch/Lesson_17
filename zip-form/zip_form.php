<?php
$error = "";
if(isset($_POST['createzip']))
{
	$post = $_POST;
	$file_folder = "files/"; 
	if(extension_loaded('zip'))
	{
		if(isset($post['files']) and count($post['files']) > 0)
		{
			$zip = new ZipArchive(); 
			$zip_name = time().".zip";
			if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
			{
				$error .= "* Sorry ZIP creation failed at this time";
			}
			foreach($post['files'] as $file)
			{
				$zip->addFile($file_folder.$file);
			}
			$zip->close();
			if(file_exists($zip_name))
			{
				header('Content-type: application/zip');
				header('Content-Disposition: attachment; filename="'.$zip_name.'"');
				readfile($zip_name);		
				unlink($zip_name);
			}
   }
   else
   $error .= "* Please select file to zip ";
   }
   else
   $error .= "* You dont have ZIP extension";
}
?>