<?php
/*
Title: Import Vendor
Order: 30
Method: Post
Message: Import have been Success.
Logged in: true

*/

?>
<h3><a href="<?php echo plugins_url('assets/file.csv', __FILE__); ?>"><?php _e('Download Sample CSV File','vendor_managemet'); ?></a></h3>
<form method="post" action="/">
			<input type="file" name="vendor_csv" id="users_csv_file">
			
			<input type="submit" value= "Import" name="import_vendor">
			
</form>	
