<?PHP

//include('session.php');

session_start();

$protocol_id = $_SESSION['protocol_id'];
$survey_id = $_SESSION['survey_Number'];

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		//===================================================
		//	GET THE QUESTION AND ANSWERS FROM THE FORM
		//===================================================

	$order = $_POST['order'];
	$label = $_POST['label'];
	$required = $_POST['required'];
	$help_text = $_POST['help_text'];
	$collection_class_id = $_POST['collection_class_id'];
	
	$order  = htmlspecialchars($order);
	$label  = htmlspecialchars($label);
	$required  = htmlspecialchars($required);
	$help_text  = htmlspecialchars($help_text);
	$collection_class_id  = htmlspecialchars($collection_class_id);

	



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

		$SQL = "select AUTO_INCREMENT from INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA = 'brmwc6_4380' and TABLE_NAME = 'Question';";

		$result = mysql_query($SQL);
		$row = mysql_fetch_row($result);
		
		$question_Number = $row[0];

		$_SESSION['question_id'] = $question_Number;


		//=========================================================
		//	INSERT THE QUESTION INTO THE tblquestions TABLE
		//=========================================================

		$SQL = "INSERT INTO Question (question_id, survey_id, question_order, label, required, help_text, collection_class_id) VALUES ('$question_Number', '$survey_id', '$order', '$label', '$required', '$help_text', '$collection_class_id')";

		$result = mysql_query($SQL);

		mysql_close($db_handle);

		print "The question has been added to the database";

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
                           Question Creation
                        </div>
                        <div class="panel-body">
                       <form action="" method="post">
  <div class="form-group">
    <label for="label">Question Label</label>
    <input id="label" class="form-control" name="label" placeholder="Enter a Question" />
  </div>
  <div class="form-group">
    <label for="order">Question Number</label>
    <input id="order" class="form-control" name="order" placeholder="Enter Question Number" type="text" />
  </div>
  <div class="form-group">
  	<label>Is this a Required Question?</label>
    <select name="required" class="form-control">
    	<option value="1">Yes</option>
    	<option value="2">No</option>
    </select>
  </div>
   <div class="form-group">
    <label for="label">Enter Help Text for Question</label>
    <input id="help_text" class="form-control" name="help_text" placeholder="Enter Question Help Text" />
  </div>
  <div class="form-group">
  	<label>Select Question Type</label>
    <select name="collection_class_id" class="form-control">
    	<option value="1">Multiple Choice</option>
    	<option value="2">Text Box</option>
    	<option value="3">Min/Max</option>
    </select>
  </div>
  <button type="submit" name="submit1" class="btn btn-default">Create Question</button>
  </form>
  <form action="logout.php">
	<button type="submit" name="submit2" class="btn btn-default">Log Out</button>
	</form>

<?PHP
}
else {
  if ($collection_class_id == 1) {
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
<form action="setChoices.php">
<button type="submit" name="submit1" class="btn btn-default">Create Choices for this Question</button>
</form>
<form action="logout.php">
<button type="submit" name="submit3" class="btn btn-default">Log Out</button>
</form>

<?PHP
  }
  else if ($collection_class_id == 2) {
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

<form action="setQuestion.php">
<button type="submit" name="submit2" class="btn btn-default">Create a new Question</button>
</form>
<form action="protocol_survey.php">
<button type="submit" name="submit2" class="btn btn-default">Create another Survey</button>
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
                           Create a Survey
                        </div>
                        <div class="panel-body">
<form action="setChoices.php">
<button type="submit" name="submit1" class="btn btn-default">Create Choices for this Question</button>
</form>
<form action="logout.php">
<button type="submit" name="submit3" class="btn btn-default">Log Out</button>
</form>}
<?PHP
  }
}
?>








