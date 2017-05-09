 <!DOCTYPE html>
<html>
<head>
	<title>This is the Upload</title>
</head>
<body>
		<fieldset>  <!-- This creates a box around the buttons.  Needs to be stylised for mobile -->
            <form action="loadfile.php" method="post" enctype="multipart/form-data">
            	Select CSV file to upload now
            	<input type="file" name="fileToUpload" accept=".csv">
            	<input type="submit" value="Upload File" name="submit">
        </fieldset>

</body>
</html>
<!-- Need to pretty this page up a little -->


