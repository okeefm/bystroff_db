<!--#include virtual="header.shtml" -->

<div class="container">

  	<h2>Edit or Delete</h2>
 	<div class="well">
  		<h3>Edit/delete Room</h3>
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
		<input class="btn edit" type="submit" value="Edit" id="editRoom" name="editRoom" />
		<input class="btn delete" type="submit" value="Delete" id="deleteRoom" name="deleteRoom" onClick="confirm('Are you sure you want to delete this room?');" />
		
		<h3>Edit/delete Location</h3>
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
		<input class="btn edit" type="submit" value="Edit" id="editLocation" name="editLocation" />
		<input class="btn delete" type="submit" value="Delete" id="deleteLocation" name="deleteLocation" onClick="confirm('Are you sure you want to delete this location?');" />
		
		<h3>Edit/delete Box</h3>
		<div class="control-group">
			<label class="control-label" for="box">Box</label>
			<div class="controls">
				<select name="box" id="box">
					<option value="" disabled selected>Select:</option>
					<option value="okeefm.1">okeefm.1</option>
					<option value="bystrc.1">bystrc.1</option>
				</select>
				<span class="help-block">Container within the fridge/freezer that holds samples</span>
			</div>
		</div>	
		<input class="btn edit" type="submit" value="Edit" id="editBox" name="editBox" />
		<input class="btn delete" type="submit" value="Delete" id="deleteBox" name="deleteBox" onClick="confirm('Are you sure you want to delete this box?');" />
	</div>

</div> <!-- /container -->

<div id="editDialog" class="modalContent">
	<h3>Edit</h3> <br />
	<input type="text" value="" id="editInput" /> <br />
	<input class="btn" type="submit" value="Submit" name="editConfirm" id="editConfirm" />
	<input class="btn simplemodal-close" type="submit" value="Cancel" id="editCancel" />
</div>

<!--#include virtual="footer.shtml" -->

<script src="assets/js/edit_locations.js"></script>
