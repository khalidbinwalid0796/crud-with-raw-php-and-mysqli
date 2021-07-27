<?php

	function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
  		$str = stripcslashes($str);
  		$str = htmlspecialchars($str);
		return mysqli_real_escape_string($con,$str);
	}
}

?>
