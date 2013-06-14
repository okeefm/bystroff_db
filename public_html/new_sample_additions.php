
<div class="control-group">
	<label class="control-label" for="comments">Comments</label>
	<div class="controls">
		<textarea name="comments" id="comments"><?php if (isset($edit)) echo $edit_row["Comments"]; ?></textarea>
		<span class="help-block">Comments about this sample.</span>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="concentration">Concentration</label>
	<div class="controls">
		<input type="text" name="concentration" id="concentration" value="<?php if (isset($edit)) echo $edit_row["Concentration"]; ?>" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="amount">Amount</label>
	<div class="controls">
		<input type="text" name="amount" id="amount" value="<?php if (isset($edit)) echo $edit_row["Amount"]; ?>" />
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="purity">Purity</label>
	<div class="controls">
		<input type="text" name="purity" id="purity" value="<?php if (isset($edit)) echo $edit_row["Purity"]; ?>" />
	</div>
</div>

<?php 

if (isset($edit)) {
	echo "<input type='hidden' name='id' value='".$edit_row['id']."' />";
}

?>
