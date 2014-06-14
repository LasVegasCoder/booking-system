<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>nj</title>
	</head>
	
	<body>
			<div id='i_err'>
			<?php
				if(isset($error)){
					if(!empty($error)){
						foreach($error as $err){
						echo "<h3 stype='color:red'>$err</h3>";
						}
					}
				}
			?>
			</div>
		</div>
		<div id_='i_result'>
		
		</div>
		<fieldset style="position: relative; margin:0px; padding:5px; width:18%; border:1px dotted gold; border-radius:5px">
			<legend>Real-Time Booking</legend>
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
				<p><label for="ia_depature">Departure date</label><p>
				<input type="date" name="ia_depature" required autofocus id="ia_depature">
				<p><label for="in_nights">Number of nights</label><p>
				<input type="number" name="in_nights" required autofocus id="in_nights min="0" max="6">
				<p><label for="i_adtguest">Number of Adult guest</label><p>
				<input type="number" name="i_adtguest" required autofocus id="i_adtguest" >
				<p><label for="i_adtguest">Number of Minor guest</label><p>
				<input type="number" name="i_minguest" required autofocus id="i_minguest" ><br>
				<input type="submit" name="i_consent" id="i_consent" value="Check Availablility" >
			</form>
		</fieldset>
		<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
	</body>

</html>
<?php
/* 
<message type='get_rates_avail'>
<auth user='' pass='' hid='' agentcode='' />
<reference></reference>
<from_date></from_date>
<to_date inclusive=''></to_date>
<numnights value='' />
<lang value=''/>
<rateplans>
<rateplan code='' />

*/
function _getData(){
$code='';

	$url 	 = 'https://www.key-res.com/api/xml_api.php?xml_data=';
	$url 	.= "<message type='get_rateplans'>";
	$url 	.= "<auth user='seminyak' pass='bvLa2011Lp' hid='DPS117' agentcode='default' />";
	$url 	.= "<reference></reference>";
	$url 	.= "<include_closed value='' />";
	$url 	.= "<include_linked value='' />";
	$url 	.= "<lang value=''/>";
	$url 	.= "<rateplans>";
	$url 	.= "<rateplan code='' id='' />";
	
	$url = urlencode($url);

$xml = simplexml_load_file($url);

function xml_attribute($object, $attribute)
{
    if(isset($object[$attribute]))
        return (string) $object[$attribute];
}

	for($i =11; $i<500; $i++){
		//$rateplan_name 	= $xml->rateplans->rateplan[$i]->rateplan_name;
		//$rateplan_type 	= $xml->rateplans->rateplan[$i]->rateplan_type;
		//$room_type 		= $xml->rateplans->rateplan[$i]->room_type;
		//$inclusion 		= $xml->rateplans->rateplan[$i]->inclusion;
		//$frateplan_images 	= $xml->rateplans->rateplan[$i]->rateplan_images->rateplan_image->fullsize;
		//$trateplan_images 	= $xml->rateplans->rateplan[$i]->rateplan_images->rateplan_image->thumbnail;
		$codes		=  xml_attribute($xml->rateplans->rateplan[$i], 'code');
		$code			  .= $codes . ',';
		//$html			   .= "<p><img src=$frateplan_images alt=$rateplan_name width='646' height='276'></p>";
		//$html			   .= "<h2 style='color:#630'>$rateplan_name</h2>";
		//$html			   .= "<p>$rateplan_type</p>";
		//$html			   .= "<p>$room_type</p>";
		//$html			   .= "<p  style='color:#666; font-family: Calibri, Verdana, Arial, Helvetica, sans-serif'>$inclusion</p>";
		
	}
	$code = rtrim($code,',');
	return $code;
}

function _getDataRates(){
$html='';
$url     = 'https://www.key-res.com/api/xml_api.php?xml_data=';
$url    .= '<message type="get_rates_avail">';
$url	.= '<auth user="seminyak" pass="bvLa2011Lp" agentcode="default" hid="DPS117"/>';
$url    .= '<reference></reference>';
$url    .= '<from_date>2014-06-11</from_date>';
$url    .= '<to_date>2014-06-30</to_date>';
$url    .= '<numnights value="1" />';
$url    .= '<rateplans>';
$url    .= '<rateplan code="SP108-JZ1BR" />';
$url    .= '<rateplan code="FE-LG1BR" />';
$url    .= '<rateplan code="FE-JZ1BR" />';
$url    .= '<rateplan code="FE-GD1BR" />';
$url    .= '<rateplan code="SP108-RY2BR" />';
$url    .= '<rateplan code="SP54-LG1BR" />';
$url    .= '<rateplan code="SP54-JZ1BR" />';
$url    .= '<rateplan code="SP54-GD1BR" />';
$url    .= '<rateplan code="SP54-DP2BR" />';
$url    .= '<rateplan code="SP54-RY2BR" />';
$url    .= '<rateplan code="SP54-EX2BR" />';
$url    .= '<rateplan code="SP65-LG1BR" />';
$url    .= '<rateplan code="SP65-JZ1BR" />';
$url    .= '<rateplan code="SP65-GD1BR" />';
$url    .= '<rateplan code="SP65-DP2BR" />';
$url    .= '<rateplan code="SP65-RY2BR" />';
$url    .= '<rateplan code="SP65-EX2BR" />';
$url    .= '<rateplan code="SP65-PS3BR" />';
$url    .= '<rateplan code="DVB-DP2BR" />';
$url    .= '<rateplan code="DVB-RY2BR" />';
$url    .= '<rateplan code="DVB-EX2BR" />';
$url    .= '<rateplan code="DVB-PS3BR" />';
$url    .= '<rateplan code="SFR-DP2BR" />';
$url    .= '<rateplan code="SFR-RY2BR" />';
$url    .= '<rateplan code="SFR-EX2BR" />';
$url    .= '<rateplan code="SFR-PS3BR" />';
$url    .= '</rateplans>';
$url    .= '</message>';

        $url = urlencode($url);

$xml = simplexml_load_file($url);

echo '<pre>' . print_r($xml,1) . '</pre>';
exit;
        for($i =11; $i<30; $i++){
                $rateplan_name          = $xml->Rateplans->Rateplan[$i]->Rateplan_name;
                $rateplan_type          = $xml->rateplans->rateplan[$i]->Rateplan_type;
                $room_type              =  xml_attribute($xml->Rateplans->Rateplan[$i], 'Code');
		$min_occup		= xml_attribute($xml->Rateplans->Rateplan[$i]->Room_occupancy->Min_pax, 'Value');
                $max_occup              = xml_attribute($xml->Rateplans->Rateplan[$i]->Room_occupancy->Max_pax, 'Value');
		$inclusion              = $xml->Rateplans->Rateplan[$i]->Inclusion;
                $frateplan_images       = $xml->Rateplans->Rateplan[$i]->;
                $trateplan_images       = $xml->rateplans->rateplan[$i]->rateplan_images->rateplan_image->thumbnail;
                $codes                  =  xml_attribute($xml->rateplans->rateplan[$i], 'code');
                $html                  .= "<p> Code : $codes </p>";
                $html                  .= "<p  style='color:#666; font-family: Calibri, Verdana, Arial, Helvetica, sans-serif'>$inclusion</p>";

        }
        return $html;
}




?>
<div>
<?php
$data = _getData();

//echo $data;
_getDataRates();
?>
</div>
