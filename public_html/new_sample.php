<?php include "header.php"; ?>

<div class="container">

	<h2>New Sample</h2>
	<div class="well">
		<form class="form-horizontal" target="search_db" method="POST">

			<?php 
			include "form_internals.php";
			
			include "new_sample_additions.php"; ?>
			<input class="btn" type="submit" name="submitAdd" value="Add" /> &nbsp;
			<input class="btn" type='submit' name="reset" id="reset" value="Reset" />
		</form>
	</div>

</div>

<script type="text/javascript">

$(document).ready(function() {
	$('.date-pick').datePicker().val(new Date().asString()).trigger('change');
});
</script>

<?php include "footer.php"; ?>