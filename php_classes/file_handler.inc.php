<?php 
	class file_handler{
		public function upload( $name, $target){
			$target = $target . basename( $_FILES[$name]['name']) ;
			$ok=1;
			if ($uploaded_size > $_POST['MAX_FILE_SIZE']){ $ok=0; }
			if ($uploaded_type=="text/php"){ $ok=0; }
			if(move_uploaded_file($_FILES[$name]['tmp_name'], $target)) { return true;
			} else { 
			echo $this->file_upload_error_message($_FILES[$name]['error']);
			return false;}
		}	
		private function file_upload_error_message($error_code) {
		  switch ($error_code) {
		  case UPLOAD_ERR_INI_SIZE:
			return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
		  case UPLOAD_ERR_FORM_SIZE:
			return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
		  case UPLOAD_ERR_PARTIAL:
			return 'The uploaded file was only partially uploaded';
		  case UPLOAD_ERR_NO_FILE:
			return 'No file was uploaded';
		  case UPLOAD_ERR_NO_TMP_DIR:
			return 'Missing a temporary folder';
		  case UPLOAD_ERR_CANT_WRITE:
			return 'Failed to write file to disk';
		  case UPLOAD_ERR_EXTENSION:
			return 'File upload stopped by extension';
		  default:
			return 'Unknown upload error';
		  }
		} 
		
	}
?>