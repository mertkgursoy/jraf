# jira rest api form

How to create a Jira task from a Form Page | Jira Rest API & PHP

Medium: https://mertgursoy.medium.com/how-to-create-a-jira-task-from-a-form-page-jira-rest-api-php-248d575e2d2e

1. Getting Jira API Token
We need to have a Jira API Token first.
You can create your own Jira API Token from this page below. "https://id.atlassian.com/manage-profile/security/api-tokens",
To create a Jira API Token:
Click the "Create API Token" button.

Give a name for the token (whatever you want) and click the "Create" button.

Once the API Token is created, click the "View" button and note that token.

2. Sending Post Request (Postman)
Select the "Post" method.
Paste the following endpoint with " Your Jira Cloud Site Name".

https://YourJiraCloudSiteName.atlassian.net/rest/api/3/issue/
Click "Autorization" tab and select "Basic Auth" option.

Enter your "Jira User Account Username/User Email".

However for the "password" instead of your "Current Jira User Account Password", we need to use the "Jira API Token" that we've created above.

Select "Body" tab then "Raw" radio button and aslo "JSON" option.

Now add the following code snippet below into json text area. Update the "key" value of your jira project key (where the task will be created) and the "issuetype" etc.

And finally click the "Send" button.

* You should have the following response below. If you've retrieved this, congratulations you've just created a task via Jira Rest API and Postman and now we are able to move forward.
3. Getting Postman Post Request (from Code)
Click the "Code" button.

Select "PHP-cURL" tab.

Copy "Post Request Code".

4. Creating A Form Page to Create A Task in Jira
Create a php form page in your web project. (i.e: form.php)

<?php
if ( isset($_POST["submitValue"]) ) {
   
  $summary = $_POST["Summary"];
  $description = $_POST["Description"];
  /* The Postman > PHP cURL Code will be added here. */
  }
?>
<form method="post">
<p>
    <label for="inp01"> Summary: </label><br>
    <input type="text" name="Summary" id="inp01" size="40px" />
  </p>
<p>
    <label for="inp02"> Description: </label><br>
    <input type="text" name="Description" id="inp02" size="40px" />
  </p>
<p>
    <input type="submit" name="submitValue" value="Submit" />
  </p>
</form>
Add/Paste "PHP cURL" code that you've copied from Postman into the indicated area in the code.

Put the following form variables instead of static texts in "CURLOPT_POSTFIELDS"

<?php
if ( isset($_POST["submitValue"]) ) {
   
  $summary = $_POST["Summary"];
  $description = $_POST["Description"];

/* The Postman > PHP cURL Code */
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://YourJiraCloudName.atlassian.net/rest/api/3/issue/",
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
        \"key\": \"YourJiraProjectKey\"\n
        },\n
        \"summary\": \"$summary\",\n
        \"description\": {\n
          \"type\": \"doc\",\n
          \"version\": 1,\n
          \"content\": [\n
              {\n
                \"type\": \"paragraph\",\n
                \"content\": [\n
                                   {\n
                                       \"type\": \"text\",\n
                                       \"text\": \"$description\"\n
                                   }\n
                             ]\n
                      }\n
                  ]\n
            },\n
            \"issuetype\": {\n
              \"name\": \"Task\"\n
                   }\n
             }
       \n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Basic ****YOUR AUTORIZATION VALUE****",
    "Content-Type: application/json",
    "Cookie: ****YOUR COOKIE VALUE****"
  ),
));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
/* The Postman > PHP cURL Code */
}
?>
<form method="post">
<p>
    <label for="inp01"> Summary: </label><br>
    <input type="text" name="Summary" id="inp01" size="40px" />
  </p>
<p>
    <label for="inp02"> Description: </label><br>
    <input type="text" name="Description" id="inp02" size="40px" />
  </p>
<p>
    <input type="submit" name="submitValue" value="Submit" />
  </p>
</form>
Save the form.php file and open this form page in browser.
Fill the "summary" and "description" inputs and submit the form.
You should have the following response in the top of the form page. If you've retrieved this, congratulations you've just created a task from your form page via Jira Rest API.
