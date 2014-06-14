<?php
error_reporting(E_ALL);
ini_set('display_errors', false);

//Change the $form = 0; to turn off the form.
$form = 1;
 	
if(isset($_POST['i_consent'])){
/* 	$_dep = !empty($_POST['ia_depature']) ? filter_var($_POST['ia_depature'], FILTER_SANITIZE_STRING) : date('Y-m-d', time());
	$_dur = !empty($_POST['in_nights']) ? filter_var($_POST['in_nights'],FILTER_SANITIZE_INT) : 3;
	$_gst = !empty($_POST['i_adtguest']) ? filter_var($_POST['i_adtguest'],FILTER_SANITIZE_INT) : 0;
	$_mnr = !empty($_POST['i_minguest']) ? filter_var($_POST['i_minguest'], FILTER_SANITIZE_INT) : 0;
	 */
//_getDataRates();
}
 
?>
<?php 
if($form ===1){
	@require_once('booking_form.php');
}

@require_once('getdata.php');
?>
 
<div>
<?php
 _getDataRates();

?>
</div>
