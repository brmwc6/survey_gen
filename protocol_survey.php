<?PHP

//include('session.php');

$errorMessage = "";

session_start(); 
$protocol_id = $_SESSION['protocol_id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		//===================================================
		//	GET THE QUESTION AND ANSWERS FROM THE FORM
		//===================================================

	$survey_name = $_POST['survey_name'];
	$survey_desc = $_POST['survey_desc'];
	//$protocol_id = $_POST['protocol_id'];
	$frequency = $_POST['frequency'];


	$survey_name  = htmlspecialchars($survey_name);
	$survey_desc = htmlspecialchars($survey_desc);
	//$protocol_id = htmlspecialchars($protocol_id);
	$frequency = htmlspecialchars($frequency);



		//============================================
		//	OPEN A CONNECTION THE DATABASE
		//============================================
	$user_name = "root";
	$password = "benM#059";
	$database = "brmwc6_4380";
	$server = "localhost";

	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		//============================================
		//	GET THE LAST QUESTION NUMBER
		//============================================

		$SQL = "select AUTO_INCREMENT from INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA = 'brmwc6_4380' and TABLE_NAME = 'Survey';";

		$result = mysql_query($SQL);
		$row = mysql_fetch_row($result);
		//$numRows = mysql_num_rows($result);

		$survey_Number = $row[0];

		$_SESSION['survey_Number'] = $survey_Number;


		//=========================================================
		//	INSERT THE QUESTION INTO THE tblquestions TABLE
		//=========================================================

		$SQL = "INSERT INTO Survey (survey_id, name, description, protocol_id, frequency_id) VALUES ('$survey_Number', '$survey_name', '$survey_desc', '$protocol_id', '$frequency')";

		$result = mysql_query($SQL);

		mysql_close($db_handle);

		print "The Survey has been added to the database";

	}
	else {
		print "Database NOT Found ";
		mysql_close($db_handle);
	}



}


?>
<?PHP

if (empty($_POST)) {
?>

<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Create a Survey
                        </div>
                        <div class="panel-body">
                       <form action="" method="post">
  <div class="form-group">
    <label for="survey_name">Survey Name</label>
    <input id="survey_name" class="form-control" name="survey_name" placeholder="Enter a survey name" />
  </div>
  <div class="form-group">
    <label for="survey_desc">Survey Description</label>
    <input id="survey_desc" class="form-control" name="survey_desc" placeholder="Enter a survey description" type="text" />
  </div>
  <div class="form-group">
  	<label>Select Frequency</label>
    <select name="frequency" class="form-control">
    	<option value="1">1hr</option>
    	<option value="2">2hr</option>
    	<option value="3">3hr</option>
    	<option value="4">4hr</option>
    </select>
  </div>
  <button type="submit" name="submit" class="btn btn-default">Create Survey</button>
  </form>
  <form action="logout.php">
	<button type="submit" name="submit3" class="btn btn-default">Log Out</button>
	</form>


<?PHP
}
else {
?>

<link href="assets/css/bootstrap.css" rel="stylesheet" />
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<link href="assets/css/style.css" rel="stylesheet" />

<div class="content-wrapper">
        <div class="container">
              <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Options
                        </div>
                        <div class="panel-body">
<form action="protocol_survey.php">
<button type="submit" name="submit1" class="btn btn-default">Create another Survey</button>
</form>
<form action="setQuestion.php">
<button type="submit" name="submit2" class="btn btn-default">Create Questions</button>
</form>
<form action="logout.php">
<button type="submit" name="submit3" class="btn btn-default">Log Out</button>
</form>


<?PHP
}
?>
