<?php include "header.php"; ?>

<div class="container">

  	<h2>Add, Edit or Delete</h2>
 	<div class="well">
		<h3>Add/Edit/Delete Owners</h3>
		<div class="control-group">
			<label class="control-label" for="owners">Owner</label>
			<div class="controls">
				<select name="owners" id="owners">
					<option value="" disabled selected>Select:</option>
					<?php
						$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
						$stmt = $mysqli->prepare("SELECT id, name FROM owners;");
						$stmt->execute();
						$res = $stmt->get_result();
						$row = $res->fetch_assoc();
						while ($row != null) {
							echo "<option value='".$row['id']."'>".$row['name']."</option>\n";
							$row = $res->fetch_assoc();
						}
					?>
				</select>
				<span class="help-block">Owner of samples</span>
			</div>
		</div>	
		<input class="btn add owners" type="submit" value="Add" id="addOwner" name="addOwner" />
		<input class="btn edit owners" type="submit" value="Edit" id="editOwner" name="editOwner" />
		<input class="btn delete owners" type="submit" value="Delete" id="deleteOwner" name="deleteOwner" />
		
		<h3>Add/Edit/Delete Types</h3>
		<div class="control-group">
			<label class="control-label" for="types">Type</label>
			<div class="controls">
				<select name="types" id="types">
					<option value="" disabled selected>Select:</option>
					<?php
						$stmt = $mysqli->prepare("SELECT id, value FROM types;");
						$stmt->execute();
						$res = $stmt->get_result();
						$row = $res->fetch_assoc();
						while ($row != null) {
							echo "<option value='".$row['id']."'>".$row['value']."</option>\n";
							$row = $res->fetch_assoc();
						}
					?>
				</select>
				<span class="help-block">Types of samples</span>
			</div>
		</div>
		<input class="btn add types" type="submit" value="Add" id="addType" name="addType" />		
		<input class="btn edit types" type="submit" value="Edit" id="editType" name="editType" />
		<input class="btn delete types" type="submit" value="Delete" id="deleteType" name="deleteType" />
		
  		<h3>Add/Edit/Delete Room</h3>
		<div class="control-group">
			<label class="control-label" for="locations">Room</label>
			<div class="controls">
				<select name="locations" id="locations">
					<option value="" disabled selected>Select:</option>
					<?php
						$stmt = $mysqli->prepare("SELECT id, value FROM locations;");
						$stmt->execute();
						$res = $stmt->get_result();
						$row = $res->fetch_assoc();
						while ($row != null) {
							echo "<option value='".$row['id']."'>".$row['value']."</option>\n";
							$row = $res->fetch_assoc();
						}
						$mysqli->close();
					?>
				</select>
				<span class="help-block">Room the location is in </span>
			</div>
		</div>	
		<input class="btn add locations" type="submit" value="Add" id="addRoom" name="addRoom" />
		<input class="btn edit locations" type="submit" value="Edit" id="editRoom" name="editRoom" />
		<input class="btn delete locations" type="submit" value="Delete" id="deleteRoom" name="deleteRoom" />
		
		<h3>Add/Edit/Delete Location</h3>
		<div class="control-group">
			<label class="control-label" for="sublocations">Location</label>
			<div class="controls">
				<select DISABLED name="sublocations" id="sublocations" class="sublocations">
						<option value="" disabled selected>Select a room first:</option>
				</select>
				<span class="help-block">Location within the room (fridge, freezer, etc.)</span>
			</div>
		</div>	
		<input class="btn add sublocations" DISABLED type="submit" value="Add" id="addsublocations" name="addsublocations" />
		<input class="btn edit sublocations" DISABLED type="submit" value="Edit" id="editsublocations" name="editsublocations" />
		<input class="btn delete sublocations" DISABLED type="submit" value="Delete" id="deletesublocations" name="deletesublocations" />
		
		<h3>Add/Edit/Delete Box</h3>
		<div class="control-group">
			<label class="control-label" for="boxes">Box</label>
			<div class="controls">
				<select DISABLED name="boxes" id="boxes" class="boxes">
					<option value="" disabled selected>Select room and location:</option>
				</select>
				<span class="help-block">Container within the fridge/freezer that holds samples</span>
			</div>
		</div>	
		<input class="btn add boxes" DISABLED type="submit" value="Add" id="addBoxes" name="addBoxes" />
		<input class="btn edit boxes" DISABLED type="submit" value="Edit" id="editbox" name="editBox" />
		<input class="btn delete boxes" DISABLED type="submit" value="Delete" id="deletebox" name="deleteBox" />
	</div>

</div> <!-- /container -->

<div id="editDialog" class="modalContent">
	<h3 id="editTitle">Edit</h3> <br />
	<input type="text" value="" id="editInput" /> <br />
	<input class="btn" type="submit" value="Submit" name="editConfirm" id="editConfirm" />
	<input class="btn simplemodal-close" type="submit" value="Cancel" id="editCancel" />
</div>

<?php include "footer.php"; ?>

<script src="assets/js/edit_locations.js"></script>
