<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form</title>
</head>
<body>
  <?php
  include "mysql.php";
  $table = "ENTRIES";
    if (isset($_POST['Submit']))
    {
      $SQL = "INSERT INTO $table set
      TITLE = '$_POST[Title]',
      Summary = '$_POST[Summary]',
      Comment = '$_POST[Comment]';";     
      $result = mysqli_query($connect,$SQL);
    }
    else 
    {
      echo "Faild to post to Database";
    }

  ?>
<form action="dbinsert.php" method="post">
Title: <input type"text" name-"Title" /><br />
Summary: <input type"text" name="Summary" /><br />
<textarea name="Content" cols="75" rows="15">
</textarea><br />
 <input type="submit" name="Submit" 
    value="Submit your comment" /><br />
</form>
</body>
</html>
