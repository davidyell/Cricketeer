<div class="matches index">
	<div class="row">
		<div class="col-md-4">
			<h2>Latest matches</h2>
			<?php echo $this->cell('Statistics::matches', ['limit' => 5]);?>
		</div>

		<div class="col-md-4">
			<h2>Top batting</h2>
			<?php echo $this->cell('Statistics::batsmen', ['limit' => 5]);?>
		</div>

		<div class="col-md-4">
			<h2>Top bowling</h2>
			<?php echo $this->cell('Statistics::bowlers', ['limit' => 5]);?>
		</div>

	</div>

	<div class="row">
		<div class="col-md-12">
			<h2>Other content</h2>
			<p>Donec egestas feugiat magna, accumsan pretium dui egestas sit amet. Ut suscipit, magna ac fermentum condimentum, purus dui facilisis eros, ac rutrum lacus felis nec velit. Curabitur malesuada molestie est a dapibus. Suspendisse in mattis urna. Phasellus laoreet scelerisque lacinia. Cras mattis eu sem nec commodo. Integer sed lacus justo. Sed facilisis bibendum augue, lobortis consequat enim aliquam sit amet. Fusce a porttitor mauris. Aenean mattis egestas urna ac maximus. Quisque quis elit tellus.</p>
			<p>Suspendisse a cursus dui, a viverra odio. Nam ut interdum nisl. Fusce urna felis, mattis sit amet vehicula molestie, pretium id lorem. Quisque consectetur volutpat elit quis suscipit. Suspendisse ut justo cursus nunc feugiat elementum. Pellentesque consectetur, nulla sit amet semper elementum, orci turpis pretium odio, a rutrum magna velit ut magna. Praesent dolor mauris, rhoncus ac augue nec, imperdiet tincidunt est. Suspendisse massa purus, luctus a nunc ut, cursus consequat dolor. Fusce lacinia mattis semper. Aenean vehicula dui eget lacinia consectetur. Nullam risus leo, facilisis at magna ut, posuere luctus turpis.</p>
		</div>
	</div>
</div>