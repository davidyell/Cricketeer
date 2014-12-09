<?php foreach ($matches as $match):
	if (!empty($match->innings)):



	?>
	<div class="match">
		<table summary="Match">
			<tr>
				<td colspan="2">
					<h3><?php echo $match->name; ?></h3>
					<p><?php echo $match->format->name; ?> at <?php echo $match->venue->name; ?> on <?php echo $match->when_played->nice(); ?></p>
				</td>
			</tr>

			<?php
			for ($i = 0; $i < (count($match->innings) / 2); $i++) {
				if (count($match->innings) === 2) {
					$team1innings = 0;
					$team2innings = 1;
					if ($i > 0) {
						$team1innings = 2;
						$team2innings = 3;
					}
				} else {
					$team1innings = 0;
					$team2innings = 2;
					if ($i > 0) {
						$team1innings = 1;
						$team2innings = 3;
					}
				}

				echo $this->element('mini-scorecard-team', [
					'inningsTeam1' => $match->innings[$team1innings],
					'inningsTeam2' => $match->innings[$team2innings],
					'matchType' => $match->format->name
				]);
			}
			?>
		</table>
	</div>
	<?php
	endif;
endforeach; ?>