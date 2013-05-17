<?php include "header.php"; ?>

<div class="container">

  	<h3>Add Room</h3>
 	<div class="well">
  		<form>
  			<div class="control-group">
				<label class="control-label" for="newRoom">Room</label>
				<div class="controls">
					<input type="text" placeholder="3W07" name="newRoom" id="newRoom" />
				</div>
			</div>
			<input class="btn" type="submit" value="Add" id="addRoom" name="addRoom" />
		</form>
	</div>

	<h3>Add Location</h3>
 	<div class="well">
  		<form>

			<div class="control-group">
				<label class="control-label" for="locationRoom">Room</label>
				<div class="controls">
					<select name="locationRoom" id="locationRoom">
						<option value="" disabled selected>Select:</option>
						<option value="3C07">3C07</option>
						<option value="3W01">3W01</option>
					</select>
					<span class="help-block">Room the location is in </span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="newLocation">Location</label>
				<div class="controls">
					<input type="text" placeholder="-80 freezer" name="newLocation" id="newLocation" />
				</div>
			</div>

			<input class="btn" type="submit" value="Add" id="addLocation" name="addLocation" />
		</form>
	</div>

	<h3>Add Box</h3>
 	<div class="well">
  		<form>

			<div class="control-group">
				<label class="control-label" for="boxRoom">Room</label>
				<div class="controls">
					<select name="boxRoom" id="boxRoom">
						<option value="" disabled selected>Select:</option>
						<option value="3C07">3C07</option>
						<option value="3W01">3W01</option>
					</select>
					<span class="help-block">Room the box is in </span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="boxLocation">Location</label>
				<div class="controls">
					<select name="boxLocation" id="boxLocation">
						<option value="" disabled selected>Select:</option>
						<option value="no_food_1">No Food 1</option>
						<option value="-80_freezer">-80 Freezer</option>
						<option value="29-80_freezer">29-80 Freezer</option>
					</select>
					<span class="help-block">Location within the room (fridge, freezer, etc.)</span>
				</div>
			</div>

  			<div class="control-group">
				<label class="control-label" for="newBox">Box</label>
				<div class="controls">
					<input type="text" placeholder="okeefm.1" name="newBox" id="newBox" />
				</div>
				<span class="help-block">Container within the fridge/freezer that holds samples</span>
			</div>

			<input class="btn" type="submit" value="Add" id="addBox" name="addBox" />
		</form>
	</div>

</div> <!-- /container -->

<?php include "footer.php"; ?>