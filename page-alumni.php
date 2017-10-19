<?php Starkers_Utilities::get_template_parts(array('parts/shared/html-header','parts/shared/header', 'parts/shared/cover'));?>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/bio'));?>
<section class="c-page__content">
	<section class="o-page__section">
		<div class="u-box">
			<section class="a-right u-pb-m">
				<div class="o-select">
					<select name="educatorsYear" id="educatorsYear">
						<?php 
							$i = 2015;
							foreach (range(date('Y'), $i) as $y) {
							    echo '<option value="'.$y.'">'.$y.'</option>';
							}
						 ?>
					</select>
				</div>
			</section>

			<?php 
				$alumni = new WP_User_Query(array(
					'role'=>'educator',
					'meta_query'=> array(
						array(
							'key'=>'year',
							'value'=>date("Y"),
							'compare'=> '='
						)
					)
				)
			);
				$educators = $alumni->get_results();
				if (!empty($educators)){
					$alumniIndex = 0;
					$aosDelay = 0;
			?>	
			<ul class="u-clear o-grid" id="educatorsGrid">
				<?php foreach($educators as $educator){

					$educatorID = $educator->ID;
					$educatorInfo = get_userdata($educatorID);
					
					$educatorFirstName = $educatorInfo->first_name;
					$educatorLastName = $educatorInfo->last_name;
					$educatorName = $educatorFirstName.' '.$educatorLastName;

					$educatorPhoto = get_field('photo', 'user_'.$educatorID);

					
					if($alumniIndex > 3){
						$alumniIndex = 0;
					}
					switch ($alumniIndex) {
						case 1:
							$aosDelay = 100;
							break;
						case 2:
							$aosDelay = 200;
							break;
						case 3:
							$aosDelay = 300;
							break;
						default:
							$aosDelay = 0;
							break;
					}
					echo renderEducator($aosDelay, $educatorName, $educatorID, $educatorPhoto);
					$alumniIndex++;
				}
				?>
			</ul>
			<?php } ?>
		</div>
	</section>
</section>
<?php Starkers_Utilities::get_template_parts(array('parts/shared/footer','parts/shared/html-footer'));?>