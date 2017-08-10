<?php if (have_rows('social_handles')): ?>
	<ul class="o-networks t-light">
		<?php while( have_rows('social_handles') ): the_row();
			$networkLabel = get_sub_field('network');
			$networkHandle = get_sub_field('handle');
			$networkLink = '';

			switch ($networkLabel) {
				case 'facebook':
					$shareLink = 'https://facebook.com/';
					break;
				case 'twitter':
					$shareLink = 'https://twitter.com/';
					break;
				case 'whatsapp':
					$shareLink = 'https://api.whatsapp.com/send?phone=';
					$networkHandle = str_replace(' ', '', $networkHandle);
					break;
				case 'instagram':
					$shareLink = 'https://instagram.com/';
					break;
				case 'pinterest':
					$shareLink = 'https://pinterest.com/';
					break;
				case 'soundcloud':
					$shareLink = 'https://soundcloud.com/';
					break;
				case 'youtube':
					$shareLink = 'https://youtube.com/';
					break;
				case 'googleplus':
					$shareLink = 'https://googleplus.com/';
					break;
				default:
					break;
			}
		?>
			
			<li><a target="_blank" href="<?php echo $shareLink.$networkHandle; ?>"><span class="o-icon s--<?php echo $networkLabel;?>"></span></a></li>
		<?php endwhile; ?>
	</ul>
<?php endif ?>