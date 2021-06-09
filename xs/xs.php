<?php


// Demand a GET parameter
if ( ! isset($_GET['user']) || strlen($_GET['user']) < 1  ) {
    die('Name parameter missing');
} else {


    $mertgursoyPass = "mert.gursoy5e78c08bdde7030c4f0b809b";
    $kiristinPass = "kiristin.okke5f68c3dbd33d7600773444fb";
    $hamzaPass = "hamza.kiyak5e6f8c31b2e0f80c43c6f6ea";
    $cagilPass = "cagil.degermen6059b81a557b95006867183c";
    $angelicaPass = "angelica.popescu5d88c648451d360dc465b967";
    $vladPass = "vlad.nastasa5d88c648e4b7210dd0a60923";

    $checkUser = (string)$_GET['user'];


    // User = Reporter //
    if ( $checkUser == $mertgursoyPass ) {
        echo "<script>console.log('User: Mert');</script>";
        $reporter = "5e78c08bdde7030c4f0b809b";
    } else if ( $checkUser == $kiristinPass ) {
      echo "<script>console.log('User: Kıristin');</script>";
        $reporter = "5f68c3dbd33d7600773444fb";
    } else if ( $checkUser == $hamzaPass ) {
      echo "<script>console.log('User: Hamza');</script>";
        $reporter = "5e6f8c31b2e0f80c43c6f6ea";
    }


    else if ( $checkUser == $cagilPass ) {
      echo "<script>console.log('User: Cagil');</script>";
        $reporter = "6059b81a557b95006867183c";
    }

    else if ( $checkUser == $angelicaPass ) {
      echo "<script>console.log('User: Angelica');</script>";
        $reporter = "5d88c648451d360dc465b967";
    }

    else if ( $checkUser == $vladPass ) {
      echo "<script>console.log('User: Vlad');</script>";
        $reporter = "5d88c648e4b7210dd0a60923";
    




    } else {
      die('Name parameter missing');
    }










    if ( isset($_POST["submitValue"]) ) {







      // echo $reporter;

      header("Refresh: 400");  // here 0 is in seconds

      // Jira Token Creator Account Creds //
      $JRAPass = "c3VwcG9ydEB4cHJlc3NnYW1pbmcubmV0OkkzcGcyeHlKTjNmaEVpakQ1RnAwRjc3Qg==";

      // Project Key //
      $projectKey = "XS";

      // Summary //
      $summary = $_POST["summary"];

      // Description //
      $description = $_POST["description"];

      // Site Id //
      if(isset($_POST['siteId'])) {

        if($_POST['siteId'] > 0) {

          $siteId = (string) $_POST['siteId'];

        } else {
            $siteId = "1";
        }


      } else {
          $siteId = "1";
      }

      // Story Point (if task or bug) //
      if(isset($_POST['storyPoint'])) {

        if($_POST['storyPoint'] > 0) {

          $storyPoint = (string) $_POST['storyPoint'];

        } else {
            $storyPoint = "1";
        }


      } else {
          $storyPoint = "1";
      }







      // Blocked Issue (XGI) //
      $blockedIssueID = (string) $_POST["blockedIssueID"];


      // Label & Provider //
      if(isset($_POST['providers'])) {
          $providers = $_POST['providers'];

      } else {
          $providers = "";
      }


      // Confluence Link //
      $confLink = $_POST['confLink'];

      // Due Date // // "2021-05-22"; //
      $dueDate = $_POST["dueDate"];

      // Default Assignee  //
      $assignee = "5e6f8c31b2e0f80c43c6f6ea"; //$_POST["assignee"];

      // Priority //
      $priority = (string) $_POST["priority"];

      // Issue Type //
      $issueType = $_POST["issueType"];
      //Note:
      // IssueType: XS - Sub-Bug ID = 10038
      // IssueType: XGI - Sub-Task ID = 10028

      if ($issueType === "Task" || $issueType === "Bug" )   {

          // CURL POST //
          $curl = curl_init();

          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://technovus.atlassian.net/rest/api/3/issue/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\n
              \"fields\": {\n
                \"project\": {\n
                  \"key\": \"$projectKey\"\n
                  },\n
                \"summary\": \"$summary\",\n
                \"description\": {\n
                  \"type\": \"doc\",\n
                  \"version\": 1,\n
                  \"content\": [\n
                  {\n
                    \"type\": \"paragraph\",\n
                    \"content\": [\n                        {\n
                      \"type\": \"text\",\n
                      \"text\": \"$description\"\n
                      }\n                    ]\n
                    }\n            ]\n
                  },\n
                  \"customfield_10139\": {\n
                    \"type\": \"doc\",\n
                    \"version\": 1,\n
                    \"content\": [\n                {\n
                      \"type\": \"paragraph\",\n
                      \"content\": [\n
                      {\n
                        \"type\": \"text\",\n
                        \"text\": \"$confLink\"\n
                      }\n                    ]\n
                    }\n            ]\n
                  },\n
                  \"issuetype\": {\n
                    \"name\": \"$issueType\"\n
                  },\n
                  \"customfield_10131\": $siteId.0,\n
                  \"customfield_10056\": $storyPoint.0,\n
                  \"labels\"  : [$providers],\n
                  \"customfield_10138\"  : [$providers],\n\n
                \t\"duedate\" : \"$dueDate\",\n
                \t\"assignee\":{ \"accountId\": \"5e6f8c31b2e0f80c43c6f6ea\"},\n
                \t\"reporter\":{ \"accountId\": \"$reporter\"},\n
                \t\"priority\": { \"name\": \"$priority\" }\n\n        \n    },\n
                  \"update\":{\n
                    \"issuelinks\":[\n         {\n
                      \"add\":{\n
                        \"type\":{\n
                          \"name\":\"Blocks\",\n
                          \"inward\":\"is blocked by\",\n
                          \"outward\":\"blocks\"\n
                          },\n
                        \"outwardIssue\":{\n
                          \"key\":\"XGI-$blockedIssueID\"\n
                          }\n
                        }\n
                      }\n      ]\n
                    }\n
                }",
          CURLOPT_HTTPHEADER => array(
              "Authorization: Basic $JRAPass",
              "Content-Type: application/json",
              "Cookie: atlassian.xsrf.token=0a5a790a-f25e-4ad0-94d5-3bf4cdfd0030_14140550c61522192c3eeb9b4b524f63734afc8f_lin"
            ),
          ));

          $response = curl_exec($curl);

          curl_close($curl);

          if ($response) {

            $json = json_decode($response, true);
            // echo "Response exists. Key:" . $json['key'];
            $jsonKey = $json['key'];

                // Task olusmus ise //
                if ($jsonKey) {

                  echo "<div style='min-height: auto;' class='container-contact100'><p style='font-size: 20px;'>Created Issue:</p><br><p style='margin-left: 2px; font-size: 20px;' ><a style='font-size: 20px;' target='_blank' rel='noopener noreferrer' href='https://technovus.atlassian.net/browse/$jsonKey'>https://technovus.atlassian.net/browse/$jsonKey</a><p></div>";



                // Task oluşmamış ise //
                } else {

                  $strResponse = (string) $response;
                  echo "<script> alert  ('Issue Key Does Not Exist Error. Please inform tech team. $strResponse ')</script>";

                }


          } else {
            echo "<script> console.log  ('Response Does Not Exist Error. Please inform tech team.  ')</script>";

          }


} else if ($issueType === "Sub-bug" )   {

  // Parent Issue (XS) //
  $parentBugId =   $_POST["parentBugId"];
  $parentBugIdStr = (string) $parentBugId;
  // echo "parentBugId:" . $parentBugId;
  // echo "parentBugIdStr:" . $parentBugIdStr;

  // CURL POST //
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://technovus.atlassian.net/rest/api/3/issue/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"{\n
      \"fields\": {\n
        \"project\": {\n
          \"key\": \"$projectKey\"\n
          },\n
        \"summary\": \"$summary\",\n
        \"description\": {\n
          \"type\": \"doc\",\n
          \"version\": 1,\n
          \"content\": [\n
          {\n
            \"type\": \"paragraph\",\n
            \"content\": [\n                        {\n
              \"type\": \"text\",\n
              \"text\": \"$description\"\n
              }\n                    ]\n
            }\n            ]\n
          },\n
          \"customfield_10139\": {\n
            \"type\": \"doc\",\n
            \"version\": 1,\n
            \"content\": [\n                {\n
              \"type\": \"paragraph\",\n
              \"content\": [\n
              {\n
                \"type\": \"text\",\n
                \"text\": \"$confLink\"\n
              }\n                    ]\n
            }\n            ]\n
          },\n

          \"parent\": {\n
            \"key\": \"XS-$parentBugIdStr\"\n
          },\n
          \"issuetype\": {\n
            \"id\": \"10038\"\n
          },\n
          \"customfield_10131\": $siteId.0,\n
          \"labels\"  : [$providers],\n
          \"customfield_10138\"  : [$providers],\n\n
        \t\"duedate\" : \"$dueDate\",\n
        \t\"assignee\":{ \"accountId\": \"5e6f8c31b2e0f80c43c6f6ea\"},\n
        \t\"reporter\":{ \"accountId\": \"$reporter\"},\n
        \t\"priority\": { \"name\": \"$priority\" }\n\n        \n    },\n
          \"update\":{\n
            \"issuelinks\":[\n         {\n
              \"add\":{\n
                \"type\":{\n
                  \"name\":\"Blocks\",\n
                  \"inward\":\"is blocked by\",\n
                  \"outward\":\"blocks\"\n
                  },\n
                \"outwardIssue\":{\n
                  \"key\":\"XGI-$blockedIssueID\"\n
                  }\n
                }\n
              }\n      ]\n
            }\n
        }",
  CURLOPT_HTTPHEADER => array(
      "Authorization: Basic $JRAPass",
      "Content-Type: application/json",
      "Cookie: atlassian.xsrf.token=0a5a790a-f25e-4ad0-94d5-3bf4cdfd0030_14140550c61522192c3eeb9b4b524f63734afc8f_lin"
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);

          if ($response) {

            $json = json_decode($response, true);
            // echo "Response exists. Key:" . $json['key'];
            $jsonKey = $json['key'];

                // Task olusmus ise //
                if ($jsonKey) {

                  echo "<div style='min-height: auto;' class='container-contact100'><p style='font-size: 20px;'>Created Issue:</p><br><p style='margin-left: 2px; font-size: 20px;' ><a style='font-size: 20px;' target='_blank' rel='noopener noreferrer' href='https://technovus.atlassian.net/browse/$jsonKey'>https://technovus.atlassian.net/browse/$jsonKey</a><p></div>";

                // Task oluşmamış ise //
                } else {

                  $strResponse = (string) $response;
                  echo "<script> alert  ('Issue Key Does Not Exist Error. Please inform tech team. $strResponse ')</script>";

                }

          } else {
            echo "<script> console.log  ('Response Does Not Exist Error. Please inform tech team.  ')</script>";

          }


        } else {
          echo "<script> console.log ('Issue Type Error. Please inform tech team.  ')</script>";
        }


    } else {
      echo "<script> console.log ('Form Does Not Exist Error. Please inform tech team.  ')</script>";
    }

}

// If the user requested logout go back to login.php
if ( isset($_POST['logout']) ) {
  header("Location: login.php");
  return;
}

?>





<!DOCTYPE html>
<html>
<head>
  <title> XS FORM </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    if ((evt.keyCode == 13) && (node.type=="number"))  {return false;}
      if ((evt.keyCode == 13) && (node.type=="password"))  {return false;}
        if ((evt.keyCode == 13) && (node.type=="date"))  {return false;}
          if ((evt.keyCode == 13) && (node.type=="radio"))  {return false;}
}

document.onkeypress = stopRKey;

</script>

<!--Date Picker-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


// Date Picker Function
$( function() {
    $( "#theDueDateIdee" ).datepicker( {  dateFormat: "yy-mm-dd"  });
} );
</script>
</head>


<body>

<form method="post" enctype="multipart/form-data">

  <div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					XS <br> JRA Create A New Issue
				</span>

        <!--IssueTyoe-->
				<div class="wrap-input100 validate-input" style="font-family: Ubuntu-Bold; text-align: center;height: 82px;background: none;display: inline-table;" data-validate="Please enter a priority">

          <div  class="wrap-input100 validate-input" data-validate="Please select an issue type" style="text-align: center;padding-top: 15px;margin-left: 0px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Task</label>
            <input style="height: 25px;top: 6px;" id="theTaskId" class="input100" type="radio" name="issueType" value="Task" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please select an issue type" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Bug</label>
            <input style="height: 25px;top: 6px;" id="theBugId" class="input100" type="radio" name="issueType" value="Bug">
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please select an issue type" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Sub Bug</label>
            <input style="height: 25px;top: 6px;" id="theSubBugId" class="input100" type="radio" name="issueType" value="Sub-bug">
  					<span class="focus-input100"></span>
			    </div>
			</div>

        <!--Summary-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a Summary">
					<input id="theSummaryIdee" class="input100" type="text" name="summary" placeholder="Summary">
					<span class="focus-input100"></span>
				</div>

        <!--Site Id-->
				<div class="wrap-input100 validate-input" data-validate = "Please enter a site id">
          <input id="theSiteIdee" class="input100"  type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" name="siteId" placeholder="Site Id">
					<span class="focus-input100"></span>
				</div>

        <!--Parent Bug XS Task-->
				<div id="theParentBugIdContainer" style="display:none;"class="wrap-input100 validate-input" data-validate = "Please enter a Parent XS Bug">
          <input  id="theParentBugIdee" class="input100"  type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==7) return false;" name="parentBugId" placeholder="Parent XS Bug ID (number only)">
					<span class="focus-input100"></span>
				</div>

        <!--Description-->
				<div class="wrap-input100 validate-input" data-validate = "Please enter a description">
					<textarea  id="theDescriptionIdee" class="input100" name="description" placeholder="Description"></textarea>
					<span class="focus-input100"></span>
				</div>

        <!--Story Point-->
				<div id="storyPointContainer" class="wrap-input100 validate-input" data-validate = "Please enter a story point">
          <input id="theStoryPointIdee" class="input100"  type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="storyPoint" placeholder="Story Point">
					<span class="focus-input100"></span>
				</div>

        <!--Blocked XGI Task-->
				<div class="wrap-input100 validate-input" data-validate = "Please enter a blocked XGI Task">
          <input id="theBlockedIssueIdee" class="input100"  type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" name="blockedIssueID" placeholder="Blocked XGI Task ID (number only)">
					<span class="focus-input100"></span>
				</div>

        <!--Confluence Link (Test Creds Prod / Stage)-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a Confluence Link (Test Creds Prod / Stage)">
					<input   id="theConfluenceLinkIdee"   class="input100" type="text" name="confLink" placeholder="Confluence Link (Test Creds Prod / Stage)">
					<span class="focus-input100"></span>
				</div>

        <!--Date Picker-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a due date">
					<input   id="theDueDateIdee"   class="input100" type="text" name="dueDate" size="30" placeholder="Due Date" readonly>
					<span class="focus-input100"></span>
				</div>


        <!--Priority-->
				<div class="wrap-input100 validate-input" style="font-family: Ubuntu-Bold; text-align: center;height: 82px;background: none;display: inline-table;" data-validate="Please enter a priority">

          <div class="wrap-input100 validate-input" data-validate="Please enter a Summary" style="text-align: center;padding-top: 15px;margin-left: 0px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Low</label>
            <input style="height: 25px;top: 6px;" id="priority" class="input100" type="radio" name="priority" placeholder="priority" value="Low" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a Summary" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Moderate</label>
            <input style="height: 25px;top: 6px;" id="moderate" class="input100" type="radio" name="priority" placeholder="priority" value="Moderate" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a Summary" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Important</label>
            <input style="height: 25px;top: 6px;" id="moderate" class="input100" type="radio" name="priority" placeholder="priority" value="Important" checked>
  					<span class="focus-input100"></span>
			    </div>
          <div class="wrap-input100 validate-input" data-validate="Please enter a Summary" style="text-align: center;padding-top: 15px;margin-left: 30px;padding-bottom: 15px;width: 92px;height: 82px;border-radius: 100px;display: inline-block;">
            <label for="priority" style="color: #bdbdd3;">Critical</label>
            <input style="height: 25px;top: 6px;" id="moderate" class="input100" type="radio" name="priority" placeholder="priority" value="Critical" checked>
  					<span class="focus-input100"></span>
			    </div>
			</div>


        <!--Label-->
				<div class="wrap-input100 validate-input" data-validate="Please enter a due date">



          <div  class="wrapper">
            <input class="input100"  type="text" id="hashtags" autocomplete="off" placeholder="label">
            <div class="tag-container">
            </div>
            <input   id="theProvidersInputIdee"   style="display:none;" type="text" class="tag-input" value='' name="providers">
          </div>


          <div id="addTagButton" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Add Label
						</span>
					</div>


      		<span class="focus-input100"></span>
				</div>





				<div class="container-contact100-form-btn">
					<button type="submit" id="theCreateButton" name="submitValue" value="Submit" class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Create
						</span>
					</button>
          <button type="submit" name="logout" value="Logout" class="contact100-form-btn">
            <span>
              <i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
              Log out
            </span>
          </button>
				</div>
			</form>
		</div>
	</div>
</form>



<br>

<!--
<pre>
  $_POST:
<?php
    print_r($_POST)


  ?>
</pre>
-->


<!--===============================================================================================-->
<!--===============================================================================================-->
<!--Tag Input-->
<link rel="stylesheet" type="text/css" href="css/tagInput.css">
<script src="js/tagInput.js"></script>


<script>

// Validation MouseOver //
$("#theCreateButton").mouseover(function(){

  var theIssueTypeValeee = $('input[name=issueType]:checked').val();
  var theSummaryIdeeVall = $("#theSummaryIdee").val();
  var theSiteIdeeVall = $("#theSiteIdee").val();
  var theParentBugIdeeVall = $("#theParentBugIdee").val();
  var theDescriptionIdeeVall = $("#theDescriptionIdee").val();
  var theStoryPointIdeeVall = $("#theStoryPointIdee").val();
  var theBlockedIssueIdeeVall = $("#theBlockedIssueIdee").val();
  var theConfluenceLinkIdeeVall = $("#theConfluenceLinkIdee").val();
  var theDueDateIdeeVall = $("#theDueDateIdee").val();
  var theProvidersInputIdeeVall = $("#theProvidersInputIdee").val();

  if (theIssueTypeValeee == 'Task'  || theIssueTypeValeee == 'Bug') {

    if (!theSummaryIdeeVall || !theSiteIdeeVall || !theDescriptionIdeeVall || !theStoryPointIdeeVall || !theBlockedIssueIdeeVall || !theConfluenceLinkIdeeVall || !theDueDateIdeeVall || !theProvidersInputIdeeVall) {
       alert("Please fill all fields!");
     } else {
       console.log("Clickable");
     }

  } else if (theIssueTypeValeee == 'Sub-bug') {

     if (!theSummaryIdeeVall || !theSiteIdeeVall || !theDescriptionIdeeVall || !theParentBugIdeeVall || !theBlockedIssueIdeeVall || !theConfluenceLinkIdeeVall || !theDueDateIdeeVall || !theProvidersInputIdeeVall) {
       alert("Please fill all fields!");
     } else {
       console.log("Clickable");
     }

  } else {

    alert("Issu");

  }


});


/* Issue Type Event Lİstener */
$('input[type=radio][name=issueType]').change(function() {
    if (this.value == 'Task') {
        console.log("Task");
        $("#theParentBugIdContainer").css("display", "none");
        $("#storyPointContainer").css("display", "block");

    }
    else if (this.value == 'Bug') {
        console.log("Bug");
        $("#theParentBugIdContainer").css("display", "none");
        $("#storyPointContainer").css("display", "block");

    } else if (this.value == 'Sub-bug') {
        console.log("Sub-bug");
        $("#theParentBugIdContainer").css("display", "block");
        $("#storyPointContainer").css("display", "none");

    } else {
      alert("alert issue type error");
    }
});

 </script>

</body>
</html>
