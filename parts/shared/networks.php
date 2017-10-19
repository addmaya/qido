<?php 
	$networks = acf_get_fields('127');
	$html = '<ul class="o-networks t-light">';
	$networkList = '';

	if ($networks){
		foreach ($networks as $network) {
			$networkName = $network['name'];
			$networkField = get_field($networkName, get_the_ID());
			if($networkField){
			$networkList .= '<li><a target="_blank" href="'.$networkField.'"><span class="o-icon s--'.$networkName.'"></span></a></li>';
			}
		}
	}
	if ($networkList) {
		$html .= $networkList;

		$html .='</ul>';
		
		echo $html;
	}
 ?>
