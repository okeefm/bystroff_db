<!--#include virtual="header.shtml" -->

<div class="container">

	<h2>New Sample</h2>
	<div class="well">
		<form class="form-horizontal" target="search_db" method="POST">

			<!--#include virtual="form_internals.shtml" -->
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

<!--#include virtual="footer.shtml" -->