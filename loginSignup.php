<?php
	$defineVariablesPhp = "defineVariables.php";

	require $defineVariablesPhp;
	require $dbConnectPhp;
	require $queryFunctionsPhp;
	require $phpFunctionsPhp;
?>

<?php
	
	$msg = NULL;

	if(isset($_GET[$colLoginSignup]) && !is_null($_GET[$colLoginSignup]))
	{
		$_GET[$colLoginSignup] = mysql_real_escape_string($_GET[$colLoginSignup]);
		$colLoginSignupVal = $_GET[$colLoginSignup];
		/*
		$colLoginSignupVal = 0 : Signup
		$colLoginSignupVal = 1 : Login
		$colLoginSignupVal = 2 : Verify
		*/
		
		/*
		$colLoginSignupVal = 1 : Signup
		$colLoginSignupVal = 2 : Login
		$colLoginSignupVal = 3 : Verify
		*/
		if($colLoginSignupVal == 0) //$colLoginSignupVal = 0 : Signup
		{
			if((isset($_GET[$colEmailId]) && !is_null($_GET[$colEmailId]))
				&&(isset($_GET[$colPassword]) && !is_null($_GET[$colPassword]))
				&&(isset($_GET[$colFullName]) && !is_null($_GET[$colFullName]))
				)
			{
				$_GET[$colEmailId] = mysql_real_escape_string($_GET[$colEmailId]);
				$_GET[$colPassword] = mysql_real_escape_string($_GET[$colPassword]);
				$_GET[$colFullName] = mysql_real_escape_string($_GET[$colFullName]);

				$retRegisterUser = registerUser($_GET[$colEmailId], $_GET[$colPassword], $_GET[$colFullName]);
				if($retRegisterUser == 1) // successfully registered
				{				
					$msg = "You are successfully registered. Please verify your email.";
				}
				elseif($retRegisterUser == 3) // mail could not be sent
				{
					$msg = "Mail was not sent. Please register again.";
				}
				elseif($retRegisterUser == 2) // Already registered
				{
					$msg = "You are already registered. Please Login.";
				}
				else
				{
					$msg = $retRegisterUser;//"There is some problem. Please try later.";
				}
			}
			else
			{
				$msg = "Fill all the form fields.";
			}
		}
		elseif($colLoginSignupVal == 1) //$colLoginSignupVal = 1 : Login
		{
			if((isset($_GET[$colEmailId]) && !is_null($_GET[$colEmailId]))
				&&(isset($_GET[$colPassword]) && !is_null($_GET[$colPassword]))
				)
			{
				$_GET[$colEmailId] = mysql_real_escape_string($_GET[$colEmailId]);
				$_GET[$colPassword] = mysql_real_escape_string($_GET[$colPassword]);

				$retCheckUserDetails = checkUserDetails($_GET[$colEmailId], $_GET[$colPassword]);
				if($retCheckUserDetails == 1) //emailId and password is correct
				{
					$msg = "You are now logged in.";
				}
				elseif($retCheckUserDetails == 0) // Registration not done
				{
					$msg = "You have to register first.";	
				}
				elseif($retCheckUserDetails == 2) // Verification not done
				{
					$msg = "Please verify your email.";	
				}
				elseif($retCheckUserDetails == 4) //emailId or password is wrong
				{
					$msg = "Email Id or Password is Incorrect.";	
				}
				else
				{
					$msg = "There is some problem. Please try later.";
				}
			}
			else
			{
				$msg = "Fill all the form fields.";
			}
		}
		elseif($colLoginSignupVal == 2) //$colLoginSignupVal = 2 : Verify
		{
			if((isset($_GET[$colEmailId]) && !is_null($_GET[$colEmailId]))
				&&(isset($_GET[$colVerifyCode]) && !is_null($_GET[$colVerifyCode]))
				)
			{
				$_GET[$colEmailId] = mysql_real_escape_string($_GET[$colEmailId]);
				$_GET[$colVerifyCode] = mysql_real_escape_string($_GET[$colVerifyCode]);

				$retUpdateVerify = updateVerify($_GET[$colEmailId], $_GET[$colVerifyCode]);
				if($retUpdateVerify == 1) // Verified
				{
					$msg = 'Congrats! Your account is verified.';
				}
				else
				{
					$msg = 'Something went wrong. Please try to verify later.';
				}
			}
			else
			{
				$msg = "Get parameters not set.";
			}
		}
	} 
	else
	{
		$msg = "Fill all the form fields.".$colLoginSignup." not set has value = ".is_null($_GET[$colLoginSignup]);
	}

	echo $msg;
?>
