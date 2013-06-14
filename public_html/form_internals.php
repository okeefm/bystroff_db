
<div class="control-group">
	<label class="control-label" for="sampleName">Sample Name</label>
	<div class="controls">
		<input type="text" placeholder="I.E. GFP" name="sampleName" id="sampleName" value="<?php if (isset($edit)) echo $edit_row["Name_of_Sample"]; ?>" />
	</div>
</div>

<div class="control-group">
<label class="control-label" for="locations">Room</label>
<div class="controls">
	<select name="locations" id="locations" class="locations loc">
		<option value="" disabled selected>Select:</option>
		<?php
			$mysqli = new mysqli($db["host"], $db["user"], $db["pass"], $db["name"], $db["port"]);
			$query = "SELECT id, value FROM locations; SELECT id, name FROM owners; SELECT id, value FROM types;";
			$mysqli->multi_query($query);
			$res = $mysqli->use_result();
			$row = $res->fetch_assoc();
			while ($row != null) {
				echo "<option value='".$row['id']."'>".$row['value']."</option>\n";
				$row = $res->fetch_assoc();
			}
		?>
	</select>
	<span class="help-block">Room the location is in </span>
</div>
</div>	

<div class="control-group">
	<label class="control-label" for="sublocations">Location</label>
	<div class="controls">
		<select DISABLED name="sublocations" id="sublocations" class="sublocations loc">
				<option value="" disabled selected>Select a room first:</option>
		</select>
		<span class="help-block">Location within the room (fridge, freezer, etc.)</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="boxes">Box</label>
	<div class="controls">
		<select DISABLED name="boxes" id="boxes" class="boxes loc">
			<option value="" disabled selected>Select room and location:</option>
		</select>
		<span class="help-block">Container within the fridge/freezer that holds samples</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="owners">Owner</label>
	<div class="controls">
		<select name="owners" id="owners">
			<option value="" disabled selected>Select:</option>
			<?php
				$mysqli->next_result();
				$res = $mysqli->use_result();
				$row = $res->fetch_assoc();
				while ($row != null) {
					echo "<option value='".$row['id']."'>".$row['name']."</option>\n";
					$row = $res->fetch_assoc();
				}
			?>
		</select>
		<span class="help-block">Owner of the sample</span>
	</div>
</div>	

<div class="control-group">
	<label class="control-label" for="sampleDate">Date</label>
	<div class="controls">
		<input name="sampleDate" id="sampleDate" class="date-pick" value="<?php if (isset($edit)) echo $edit_row["Date"]; ?>" placeholder="YYYY-MM-DD">
		<br />
		<span class="help-block">Date the sample was added to the system.</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="type">Type</label>
	<div class="controls">
		<select name="type" id="type">
			<option value="" disabled selected>Select:</option>
			<?php
				$mysqli->next_result();
				$res = $mysqli->use_result();
				$row = $res->fetch_assoc();
				while ($row != null) {
					echo "<option value='".$row['id']."'>".$row['value']."</option>\n";
					$row = $res->fetch_assoc();
				}
				$mysqli->close();
			?>
		</select>
		<span class="help-block">Type of sample (DNA, RNA, protein, etc.)</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="gi_number">GI Number</label>
	<div class="controls">
		<input type="text" placeholder="GI Number" name="gi_number" id="gi_number" value="<?php if (isset($edit)) echo $edit_row["Gi_number"]; ?>" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="sequence">Sequence</label>
	<div class="controls">
		<textarea name="sequence" id="sequence"><?php if (isset($edit)) echo $edit_row["Sequence"]; ?></textarea>
		<span class="help-block">The sequence of the sample.</span>
	</div>
</div>

<script src="assets/js/form_internals.js"></script>