<?php
	include_once('modules/facebook.php');
	$facebookConnect = new FacebookConnect();
	if( $facebookConnect->getFacebookAccessToken() )
	{
		wp_redirect( home_url('mide-el-riesgo') );
	} else {
		$facebookConnect->setFacebookAccessToken();
		wp_redirect( home_url('mide-el-riesgo') );
	}
?>
