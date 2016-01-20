<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0
 Strict//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>First Prodject</title>
</head>
	<body>
		<?php
		$Dir = "comments";
		$UserName = $_POST['UName'];
		if (is_dir($Dir))
		{
			if (isset($_POST['save']))
			{
				if ($UserName == "")
				{
					$UserName = "Guests";
				}
				$RegUsers = scandir($Dir);
				$found = 0;
				foreach($RegUsers as $User)
				{
					if (strcmp($User, $UserName) == 0)
					{
						$found = 1;
					}
				}
				if ($found != 1)
				{
					mkdir($Dir.'/'.$UserName, 0777);
				}
				echo date('r');
				$date = explode(" ", date('r'));
				$saveDate = $date[2]."-".$date[1]."-".$date[3]."-".$date[4];
				$txt = $_POST['comment'];
				$comment = fopen($Dir.'/'.$UserName.'/'.$saveDate, "w+");
				fwrite($comment, $txt);
				fclose($comment);
			}
		}

		?>






<h2>Small Project Comments</h2>
<form action="Test.php" method = 'POST' name = "Test">
User Name: <input type="text" name="UName" /><br />
Your email: <input type="text" name="email" /><br />
<textarea name="comment" rows="6" cols="100">
</textarea><br />
<input type="submit" name="save" 
	value="Submit your comment" /><br />
	<select name='selectname'>
		<?php
		$RegUsers = scandir($Dir);
		foreach ($RegUsers as $User)
		{
			if (strcmp($User, ".") != 0 && strcmp($User, "..") != 0)
			{
				echo "<option value='".$User."'>".$User."</option>";
			}
		}
		?>
	</select>
	<input type='submit' name='Show_Comments' value="show comments">
	<?php
	if (isset($_POST['Show_Comments']))
	{
		echo "<br />";
		$comments = scandir($Dir."/".$_POST['selectname']);
		foreach ($comments as $Cheers)
		{
			if (strcmp($Cheers, ".") != 0 && strcmp($Cheers, "..") != 0)
			{
				$file = fopen($Dir."/".$_POST['selectname']."/".$Cheers, r);
				while (($line = fgets($file)) !== false)
				{
					echo "$line <br />";
				}
				fclose($file);
			}
		}
	}
	?>
</form>
	</body>
	</html>
