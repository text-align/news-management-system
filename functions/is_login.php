<?php
class islogin{
function is_login(){
	if((@$_SESSION["user_id"])==24){
		return TRUE;
	}else{
		return FALSE;
	}
}
function  is_login_1(){
	if(isset ($_SESSION["user_id"])){
		return TRUE;
	}else{
		return FALSE;
	}
}
}
?>
