<?php
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
		$codes		=  xml_attribute($xml->rateplans->rateplan[$i], 'code');
		$code			  .= $codes . ',';
	}
	$code = rtrim($code,',');
	return $code;
}


	function _getDataRates(){
		$codes = _getData();
		$today = date('Y-m-d', strtotime('+1 days'));
		$end = date('Y-m-d', strtotime('+10 days'));
		
	if(isset($_POST[''])){
		$_dep = !empty($_POST['ia_depature']) ? $_POST['ia_depature'] : date('Y-m-d', time());
		$_dur = !empty($_POST['in_nights']) ? $_POST['in_nights'] : 3;
		$_gst = !empty($_POST['i_adtguest']) ? $_POST['i_adtguest'] : 0;
		$_mnr = !empty($_POST['i_minguest']) ? $_POST['i_minguest'] : 0;
	}
		
	$html='';
	$url     = 'https://www.key-res.com/api/xml_api.php?xml_data=';
	$url    .= '<message type="get_rates_avail">';
	$url	.= '<auth user="seminyak" pass="bvLa2011Lp" agentcode="default" hid="DPS117"/>';
	$url    .= '<reference></reference>';
	$url    .= '<from_date>'. $today.'</from_date>';
	$url    .= '<to_date>'. $end . '</to_date>';
	$url    .= '<numnights value="1" />';
	$url    .= '<rateplans>';
	//$url    .= '<rateplan code='.$codes.' />';
	
	
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
	//echo $xml->rateplans->rateplan[0]->rateplan_name;
	
	//echo '<pre>' . print_r($xml,1) . '</pre>'; exit;

for($i =0; $i<count($xml); $i++){
		$rateplan_name 	= $xml->rateplans->rateplan[$i]->rateplan_name;
		$rateplan_type 	= $xml->rateplans->rateplan[$i]->rateplan_type;
		$room_type 		= $xml->rateplans->rateplan[$i]->room_type;
		$inclusion 		= $xml->rateplans->rateplan[$i]->inclusion;
		
		$rmcode			= xml_attribute($xml->rateplans->rateplan[$i], 'code');
		$rmid			= xml_attribute($xml->rateplans->rateplan[$i], 'id');
		$rm_min			= xml_attribute($xml->rateplans->rateplan[$i]->room_occupancy->min_pax, 'value');
		$rm_max			= xml_attribute($xml->rateplans->rateplan[$i]->room_occupancy->max_pax, 'value');
		$currency		= xml_attribute($xml->rateplans->rateplan[$i]->currency, 'code');
		$avai_date		= xml_attribute($xml->rateplans->rateplan[$i]->nightcounter[$i], 'date');
		$rate1			= xml_attribute($xml->rateplans->rateplan[$i]->nightcounter[$i]->rate_1_pax, 'value');
		$rate2			= xml_attribute($xml->rateplans->rateplan[$i]->nightcounter[$i]->rate_1_pax, 'add');
		$rm_avai		= xml_attribute($xml->rateplans->rateplan[$i]->nightcounter[$i]->avail, 'value');
		$rm_min_stay	= xml_attribute($xml->rateplans->rateplan[$i]->nightcounter[$i]->min_stay, 'value');
		
		$frateplan_images ='<hr style="margin:0px; padding:0px; width:40%">';
		//$frateplan_images 	= $xml->rateplans->rateplan[$i]->rateplan_images->rateplan_image->fullsize;
		//$trateplan_images 	= $xml->rateplans->rateplan[$i]->rateplan_images->rateplan_image->thumbnail;
		$codes		=  xml_attribute($xml->rateplans->rateplan[$i], 'code');
		//$code			  .= $codes . ',';
		$html			   .= "<p>$frateplan_images</p>";
		$html			   .= "<h2 style='color:#630'>$rateplan_name</h2>";
		$html			   .= "<p>Available : "  . $rm_avai = isset($rm_avai)? 'Yes' : 'No' . "</p>";
		$html			   .= "<p>Available Date: $avai_date </p>";
		$html			   .= "<p>$room_type</p>";
		$html			   .= "<p>RoomCode: $rmcode</p>";
		$html			   .= "<p>Minimum stay: $rm_min <span> Maximum stay: $rm_max</span></p>";
		$html			   .= "<p>Currency Type: $currency <span> Rate: $rate1</span><span> Additional Guest: $rate2</span></p>";
		$html			   .= "<p  style='color:#666; font-family: Calibri, Verdana, Arial, Helvetica, sans-serif'>$inclusion</p>";
		
	}
	//$code = rtrim($code,',');
	echo $html;	
	
	
	
/* 			for($i =11; $i<30; $i++){
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
			  */
	}
 

?>