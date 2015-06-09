<?php


	 #1 Load libs
require_once 'form.lib.php';
require_once 'upload.lib.php';
require_once 'url.lib.php';

	#2 Logic
	
	// print_r($_FILES);

	#if any files were uploaded
	if($_FILES){
		#move the files into the uploads folder
		if($_FILES){

			$files = Upload::to_folder('uploads/');

			if($files[0]['error_message'] == false){
				URL::redirect($files[0]['filepath']);
			}else{
				echo $files[0]['error_message'];
			}
		}

		#Redirect to the newly uploaded file
		URL::redirect('uploads/'.$filename);
	}

	#3 Load views

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload files with php</title>
</head>
<body>
	<h1>Upload files with php</h1>

	<?= Form::open_upload() ?>
		
		<div class="form-group">
			<?= Form::label('file', 'File:') ?>
			<?= Form::file() ?>
		</div>
		
		<?= Form::submit() ?>
	<?= Form::close() ?>


</body>
</html>