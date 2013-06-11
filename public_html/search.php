<form class="form-horizontal" action="search_db.php" id="search_db" method="POST">

	<?php include "form_internals.php"; ?>
	
	<input class="btn" type="submit" name="submitSearch" value="Search" /> &nbsp;
	<input class="btn" type='submit' name="reset" id="reset" value="Reset" />
		
	<br /> <br />
	<div>
		Tip: to search for a partial sequence, use the wildcard operator (" * ") at the ends of the search string (e.g. " *CAGCGG* "). To search for a partial sequence at the start or end of a sequence, use a wildcard operator only at one end of the search string.
	</div>
</form>