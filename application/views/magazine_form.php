<form method="post" >
	<div>
		<label for="publication_id"> Publication name</label>
		<select name="publication_id">
			<?php
			foreach ($publication_form_optional as $publication_id => $publication_name){
				echo '<optional value="' .html_escape($publication_id).'">'.html_escape($publication_name). '</optiona>';
			}
			?>
		</select>
	</div>
	<div>
		<label for="issue_number"> Issue Number</label>
		<input tyoe ="text"  name="issue_number" value=""/>
	</div>
	<div>
		<label for="issue_date_publication">Date Published </label>
		<input type="text" name="issue_date_publication" value=""/>
	</div>
	<div>
		<input type="submit" value="Save"/>
	</div>
		
	</form>
