<div class="control-group">
	<label class="control-label" for="sampleName">Sample Name</label>
	<div class="controls">
		<input type="text" placeholder="I.E. GFP" name="sampleName" id="sampleName" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="room">Room</label>
	<div class="controls">
		<select name="room" id="room">
			<option value="" disabled selected>Select:</option>
			<option value="3C07">3C07</option>
			<option value="3W01">3W01</option>
		</select>
		<span class="help-block">Room the sample is in </span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="location">Location</label>
	<div class="controls">
		<select name="location" id="location">
			<option value="" disabled selected>Select:</option>
			<option value="no_food_1">No Food 1</option>
			<option value="-80_freezer">-80 Freezer</option>
			<option value="29-80_freezer">29-80 Freezer</option>
		</select>
		<span class="help-block">Location within the room (fridge, freezer, etc.)</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="box">Box</label>
	<div class="controls">
		<select name="box" id="box">
			<option value="" disabled selected>Select:</option>
			<option value="Chris.1">Chris.1</option>
			<option value="schenc3.1">schenc3.1</option>
			<option value="macars.1">macars.1</option>
			<option value="frasek.1">frasek.1</option>
		</select>
		<span class="help-block">Box within the fridge/freezer</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="sampleDate">Date</label>
	<div class="controls">
		<input name="sampleDate" id="sampleDate" class="date-pick" placeholder="MM/DD/YYYY">
		<br />
		<span class="help-block">Date the sample was added to the system.</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="type">Type</label>
	<div class="controls">
		<select name="type" id="type">
			<option value="" disabled selected>Select:</option>
			<option value="DNA">DNA</option>
			<option value="RNA">RNA</option>
			<option value="Protein">Protein</option>
			<option value="Reagent">Reagent</option>
		</select>
		<span class="help-block">Type of sample (DNA, RNA, protein, etc.)</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="sequence">Sequence</label>
	<div class="controls">
		<textarea name="sequence" id="sequence"></textarea>
		<span class="help-block">The sequence of the sample.</span>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	Date.format = 'mm/dd/yyyy';
   	$('.date-pick').datePicker(
		{
			startDate: '01/01/2000',
			endDate: (new Date()).asString()
		}
	);

	$("#reset").click(function(e) {
		e.preventDefault();
		$("#sampleName").val("");
		$("#location").val("");
		$("#sublocation").val("");
		$("#box").val("");
		$("#sampleDate").val("");
		$("#type").val("");
		$("#sequence").val("");
	});
 });
</script>