<ul class="o-networks t-light">
	<?php 
		$networks = acf_get_fields('127');
		if ($networks){
			foreach ($networks as $network) {
				$networkName = $network['name'];
				$networkField = get_field($networkName, get_the_ID());
				if($networkField){
				echo '<li><a target="_blank" href="'.$networkField.'"><span class="o-icon s--'.$networkName.'"></span></a></li>';
				}
			}
		}
	 ?>
</ul>