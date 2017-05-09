<?php

$target_dir = "uploads/"; // set new target
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Rename the current file if it exists so we have an archive
$date = date("Ymdhi");
$filename = 'uploads/DailyYard.csv';
$updatedTime = date("d/m/Y:i");

if( file_exists($filename)// place something in here to identify if the file exists "subject.csv"
	) {
	// echo "The file ".$filename." has been renamed!";
	rename($filename, 'uploads/'.$date."archived.csv");
} 

//Testing can be commented out in final.
echo "The date is: ".$date."<br>";
echo "This is the Target Filepath: ".$target_dir;
echo "<br>This is the Target File: ".$target_file;
echo "<br>This is the Target FilepType: ".$fileType;
// Allow certain file formats
if($fileType != "csv" ) {
    echo "Sorry, only CSV files are allowed. ";
}
else { //need ot add something in to ensure that onyl fioles names 'sdkfjhasdf.csv' are allowed to be uploaded.
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br><br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.
        <br> You will be redirected back to the main yard once the file has been processed. <br>
        The most recent update was: ".$updatedTime.".";
        
        // include('loaddata.php');
// Insert SQL script here IF Fails then run an error telling user to ensure the file that was uploaded was correct.

    } else {
        echo "Sorry, there was an error uploading your file.<br>
        Please ensure that you are uplaoding an unmodified version of the Daily Yard.";
    }


//return to the original webpage need to update this hardcode
    include('yardload.php');
// header('Refresh: 5; /yard/');

// need to include a sequence here that inserts the csv file into the table.
// IF fileName = sdfdsfsdf { execute sql DROP TABLE IF EXISTS, LOAD DATA INFILE LOCAL, ?set summary column as forst letter of name }
}
?>


