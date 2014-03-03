<?php
	class architect{
		private $Page_id = '';

		public function buildPage( $page_content ){
			$this->Page_id = $_GET['page_id'];
			if($this->Page_id==''){
				echo '404';
			} else {
				echo 'hi';
			} 
		}



	}
?>