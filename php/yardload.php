<?php
// Include the connection file currently set to Root of OpenHab for teting purposed
include('connection2.php');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
	echo "Seems legit <br>";
}

// Setup some queries


$droptable = "DROP TABLE IF EXISTS `wbyard`;" ;

/* Drop the table if it exists */
if (mysqli_query($conn2, $droptable) === TRUE) {
    printf("Table wbyard successfully dropped.\n<br>");
} ;

$createtable = "
CREATE TABLE IF NOT EXISTS `wbyard` (
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    HeaderRowA0 VARCHAR(30) NOT NULL,
    HeaderRowA1 VARCHAR(30) NOT NULL,
    textbox6 VARCHAR(30) NOT NULL,
    HeaderRowA2 VARCHAR(30) NOT NULL,
    HeaderRowA3 VARCHAR(30) NOT NULL,
    HeaderRowA4 VARCHAR(30) NOT NULL,
    HeaderRowA5 VARCHAR(30) NOT NULL,
    textbox12 VARCHAR(30) NOT NULL,
    textbox25 VARCHAR(30) NOT NULL,
    textbox23 VARCHAR(30) NOT NULL,
    textbox21 VARCHAR(30) NOT NULL,
    textbox18 VARCHAR(30) NOT NULL,
    textbox16 VARCHAR(30) NOT NULL,
    textbox14 VARCHAR(30) NOT NULL,
    textbox27 VARCHAR(30) NOT NULL,
    HeaderRowA6 VARCHAR(30) NOT NULL,
    OrderID INT,
    CustomerName VARCHAR(50),
    InstructorName VARCHAR(50),
    InstructorStatusCode VARCHAR(30) NOT NULL,
    Request VARCHAR(30),
    StartLessonLocation VARCHAR(30),
    InstructorActivity VARCHAR(100) NOT NULL,
    StartDate VARCHAR(30) NOT NULL,
    ActivityEndTime VARCHAR(30) NOT NULL,
    SkillLevel INT,
    TotalStudents INT NOT NULL,
    ReturnStudents INT NOT NULL,
    InstructorRank INT NOT NULL,
    RequestHours INT NOT NULL,
    CheckInInd VARCHAR(2) NOT NULL,
    Comments VARCHAR(255),
    Textbox9 INT,
    TotalStudents1 INT,
    PRIMARY KEY (`id`)


);" ;

/* Create table doesn't return a resultset */
if(mysqli_query($conn2, $createtable) === TRUE){
	printf("Table wbyard successfully created.\n<br>");
};


// /*  Load the csv file into MySQL */
// // Load Data not working - OPtional encolsed by is causeing issues!
$sqlLoad = 
'
LOAD DATA LOCAL INFILE "/media/DCA2998AA2996A32/www/nest/php/uploads/DailyYard.csv"
INTO TABLE `wbyard`
FIELDS TERMINATED BY ","
OPTIONALLY ENCLOSED BY "\""
LINES TERMINATED BY "\r"
IGNORE 1 LINES 
(    HeaderRowA0,
    HeaderRowA1,
    textbox6,
    HeaderRowA2,
    HeaderRowA3,
    HeaderRowA4,
    HeaderRowA5,
    textbox12,
    textbox25,
    textbox23,
    textbox21,
    textbox18,
    textbox16,
    textbox14,
    textbox27,
    HeaderRowA6,
    OrderID,
    @CustomerName,
    InstructorName,
    InstructorStatusCode,
    Request,
    StartLessonLocation,
    InstructorActivity,
    StartDate,
    ActivityEndTime,
    SkillLevel,
    TotalStudents,
    ReturnStudents,
    InstructorRank,
    RequestHours,
    CheckInInd,
    Comments,
    Textbox9,
    TotalStudents1)
    SET CustomerName = nullif(@CustomerName, " ");
  '      
 ; 

// mysqli_options($conn2, MYSQLI_OPT_LOCAL_INFILE, true);
// Currently SQL Load does not work - possible acces rights or incorrect filepath..
if (mysqli_query($conn2, $sqlLoad)) {
	printf("Fresh Yard data has been loaded please standby for processing.<br>");
    mysqli_query($conn2,"CALL `MergeYardAndPro`();");
} else {
	printf("This didnt work throw us some error messages!!");
	printf("Error: %s\n", mysqli_error($conn2));
};

/* Select queries return a resultset */
if ($result = mysqli_query($conn2, "Select CustomerName, InstructorName, Request, InstructorActivity, TotalStudents, Comments from wbyard WHERE CHAR_LENGTH(CustomerName) > 10 IS NOT NULL ;")) {
    printf("<br>Select returned %d rows.\n", mysqli_num_rows($result));


	    while($row = mysqli_fetch_array($result)) {
	    $custname = $row['CustomerName'];
	    $instname = $row['InstructorName'];
	    $req = $row['Request'];
	    $activity = $row['InstructorActivity'];
	    $numstud = $row['TotalStudents'];
        $comm = $row['Comments'];

		// echo '<br>'.$custname.'<br>'.$instname.'<br>'.$req.'<br>'.$activity.'<br>'.$comm.'<br>';
        // echo "<br>refreshing this shit<br>";

		} ;
		    /* free result set */
    mysqli_free_result($result);

	};


// header('Refresh: 1; http://omv.local:82/yard/yard.php');

header('Refresh: 1; ../index.php');
mysqli_close($conn2);
exit;



?>
<!-- 
	(@date, name, type, @number, @duration, @addr, @pin, @city, @state, @country, lat, log)
        SET date = STR_TO_DATE(@date, '%b-%d-%Y %h:%i:%s %p'),
            number = TRIM(BOTH '\'' FROM @number),
            duration = 1 * TRIM(TRAILING 'Secs' FROM @duration),
            addr = NULLIF(@addr, 'null'),
            pin  = NULLIF(@pin, 'null'),
            city = NULLIF(@city, 'null'),
            state = NULLIF(@state, 'null'),
            country = NULLIF(@country, 'null')
             -->

             <!-- LOAD DATA INFILE '/media/DCA2998AA2996A32/www/yard/scripts/uploads/subject.csv'
        INTO TABLE `wbyard`
        FIELDS TERMINATED BY ',' 
        LINES TERMINATED BY '\r'
        IGNORE 1 LINES 
        (emp_id, firstname, lastname, email, reg_date); -->