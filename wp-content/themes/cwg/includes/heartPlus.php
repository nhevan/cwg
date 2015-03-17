<?
	function heartPlusAction(){
		$child_id = $_POST['']
		return 143;
		if($child_id != 0){
			$current_heart_count = (int)get_field('current_heart_count', $child_id);
			update_field('current_heart_count', ++$current_heart_count , $child_id); 
			 return $current_heart_count;
		}
	}
?>