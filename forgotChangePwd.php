<?php
	$defineVariablesPhp = "defineVariables.php";

	require $defineVariablesPhp;
	require $dbConnectPhp;
	require $queryFunctionsPhp;
	require $phpFunctionsPhp;
?>

<?php
	$msg = NULL;

	if(isset($_GET[$sendPwdVerifyCode]) && !is_null($_GET[$sendPwdVerifyCode]))
	{
		$sendPwdVerifyCodeVal = mysql_real_escape_string($_GET[$sendPwdVerifyCode]);
		if($sendPwdVerifyCodeVal == 1)
		{//Send Mail for password change
			if(isset($_GET[$colEmailId]) && !is_null($_GET[$colEmailId]))
			{
				$colEmailIdVal = mysql_real_escape_string($_GET[$colEmailId]);
				$retSendPwdVerifyCode = sendPwdVerifyCode($colEmailIdVal);
				if($retSendPwdVerifyCode == 1)
				{//PwdVerifyCode added to db
					$msg = "An email will be sent to you in few minutes to reset your password.";
				}
				elseif($retSendPwdVerifyCode == 2)
				{//Could not add PwdVerifyCode to db
					$msg = "Could not add PwdVerifyCode to db.";
				}
				elseif($retSendPwdVerifyCode == 3)
				{//Mail couldnot be sent
					$msg = "Sorry! Mail couldnot be sent.";
				}
			}
			else
			{
				$msg = "$colEmailId is not set in GET.";
			}

			$redirectUrl = $indexPageUrl.'?'.$getMsg.'='.$msg;
			echo '<script> window.location.replace("'.$redirectUrl.'"); </script>';
		}
		elseif($sendPwdVerifyCodeVal == 2)
		{//Show Html page
			$colPwdVerifyCodeVal = NULL;
			if((isset($_GET[$colPwdVerifyCode]) && !is_null($_GET[$colPwdVerifyCode]))
				)
			{
				$colPwdVerifyCodeVal = mysql_real_escape_string($_GET[$colPwdVerifyCode]);
			}
			else
			{
				$msg = "$colPwdVerifyCode is not set in GET.";
				$redirectUrl = $indexPageUrl.'?'.$getMsg.'='.$msg;
				echo '<script> window.location.replace("'.$redirectUrl.'"); </script>';
			}

		}
		elseif($sendPwdVerifyCodeVal == 3)
		{//Update Password
			if((isset($_GET[$colPwdVerifyCode]) && !is_null($_GET[$colPwdVerifyCode]))
				&&(isset($_GET[$colPassword]) && !is_null($_GET[$colPassword]))
				)
			{
				$colPwdVerifyCodeVal = mysql_real_escape_string($_GET[$colPwdVerifyCode]);
				$colPasswordVal = mysql_real_escape_string($_GET[$colPassword]);

				$retUpdatePwd = updatePwd($colPwdVerifyCodeVal, $colPasswordVal);
				if($retUpdatePwd == 2)
				{//$colPwdVerifyCode is not present in db
					$msg = "$colPwdVerifyCode is not present in db";
				}
				elseif($retUpdatePwd == 1) 
				{//Update done
					$msg = "Update done";
				}
				elseif($retUpdatePwd == 3) 
				{//Could not be updated
					$msg = "Could not be updated";
				}
				else
				{
					$msg = "Dont know what is wrong.";
				}
			}
			else
			{
				$msg = "$colPwdVerifyCode or $colPassword not set.";
			} 

			$redirectUrl = $indexPageUrl.'?'.$getMsg.'='.$msg;
			echo '<script> window.location.replace("'.$redirectUrl.'"); </script>';
		}
		else
		{
			$msg = "$sendPwdVerifyCodeVal not set in GET variable.";
			$redirectUrl = $indexPageUrl.'?'.$getMsg.'='.$msg;
			echo '<script> window.location.replace("'.$redirectUrl.'"); </script>';
		}
	}
	else
	{
		$msg = "$sendPwdVerifyCode not set in GET.";
		$redirectUrl = $indexPageUrl.'?'.$getMsg.'='.$msg;
		echo '<script> window.location.replace("'.$redirectUrl.'"); </script>';
	}
?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=divice-width, initial-scale=1.0">
		<title>Nishi Agarwal</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/customIndex.css">
	</head>

	<body>
		<div class="container">
			<section>
				<div class="row">
					<h2><?php echo $msg; ?></h2>
				</div>
			</section>
			<section>
				<div class="row">
					<form action="forgotChangePwd.php" method="GET" enctype="multipart/form-data">
						<input name=<?php echo '"'.$colPassword.'"'; ?> class="form-control" placeholder="New Password"/>
						<br>
						<input type="submit" class="btn btn-default" value="Submit"/>
						<input name=<?php echo '"'.$colPwdVerifyCode.'"'; ?> value=<?php echo '"'.$colPwdVerifyCodeVal.'"' ?> class="display-hidden" placeholder=""/>
						<input name=<?php echo '"'.$sendPwdVerifyCode.'"'; ?> value="3" class="display-hidden" placeholder=""/>
						<br>
					</form>
				</div>
			</section>
		</div>
	</body>
</html>