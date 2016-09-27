<?php 
	
	function generateRandomString($length = 20) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = time();
	    for ($i = 0; $i < $length; $i++) 
	    {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    return $randomString;
	}

	function sendMail($to, $subject, $message, $from)
	{
		$headers = 'From: '.$from. "\r\n" .
		    'Reply-To: '.$from. "\r\n" .
		    'MIME-Version: 1.0' . "\r\n" .
		    'Content-type:text/html;charset=UTF-8' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		return mail($to, $subject, $message, $headers);
	}

	function queryCol($tableNameVal, $whereAttrName, $whereAttrVal)
	{
		$tableNameVal= mysql_real_escape_string($tableNameVal);
		$colSelectName= mysql_real_escape_string($colSelectName);
		$whereAttrVal= mysql_real_escape_string($whereAttrVal);
		
		$query= "select * from `".$tableNameVal."` where `".$whereAttrName."` = '".$whereAttrVal."'";
		if(@$query_run= mysql_query($query))
		{
			while(@$query_row= mysql_fetch_assoc($query_run))
			{
				return $query_row;
			}

			return false;//"111111111      ".$query;//false;
		}
		else
		{
			return false;//"222222222      ".$query;//false;
		}
	}

	function querySelectAllRows($tableNameVal)
	{
		$retAllRowsArray = array();
		$tableNameVal= mysql_real_escape_string($tableNameVal);
		$query= "select * from `".$tableNameVal."`";
		
		if(@$query_run= mysql_query($query))
		{
			while(@$query_row= mysql_fetch_assoc($query_run))
			{
				array_push($retAllRowsArray, $query_row);
			}

			return $retAllRowsArray;//"111111111      ".$query;//false;
		}
		else
		{
			return false;//"222222222      ".$query;//false;
		}
	}


	function checkRegistered($colEmailIdVal)
	{
		global $dbName, $userTableName, $colEmailId;
		$query = 'select count(*) as cnt from `'.$userTableName.'` where `'.$colEmailId.'` = "'.$colEmailIdVal.'"';
		
		if(@$query_run= mysql_query($query))
		{
			while(@$query_row= mysql_fetch_assoc($query_run))
			{
				if($query_row['cnt'] > 0)
				return $query_row['cnt'];
				else 
				return 0;
			}

			return 0;
		}
		else
		{
			return 0;
		}
	}

	function checkVerified($colEmailIdVal)
	{
		global $dbName, $userTableName, $colEmailId, $colVerified;
		$query = 'select `'.$colVerified.'` from `'.$userTableName.'` where `'.$colEmailId.'` = "'.$colEmailIdVal.'"';
		if(@$query_run= mysql_query($query))
		{
			while(@$query_row= mysql_fetch_assoc($query_run))
			{
				if($query_row[$colVerified] == "1")
				return 1;
				else 
				return 0;
			}
		}
		else
		{
			return 0;
		}
	}

	function checkEmailIdPwd($colEmailIdVal, $colPasswordVal)
	{
		global $dbName, $userTableName, $colEmailId, $colPassword;
		$query = 'select `'.$colPassword.'` from `'.$userTableName.'` where `'.$colEmailId.'` = "'.$colEmailIdVal.'"';
		if(@$query_run= mysql_query($query))
		{
			while(@$query_row= mysql_fetch_assoc($query_run))
			{
				if($query_row[$colPassword] == $colPasswordVal)
				return 1; //emailId and password is correct
				else 
				return 2; //emailId or password is wrong;
			}
		}
	

		echo $query;
		echo mysql_error();	
		return 0;
		
	}

	function registerUser($colEmailIdVal, $colPasswordVal, $colFullNameVal)
	{
		global $dbName, $userTableName, $colVerified, $colEmailId, $colPassword, $colVerifyCode, $colFullName, $loginSignupUrl, $colLoginSignup;

		//Check if already registered
		$retCheckRegistered = checkRegistered($colEmailIdVal);
		if($retCheckRegistered != 0)
		{
			return 2;
		}

		//add User
		$colVerifyCodeVal = generateRandomString();
		$to = 'agarwalvivek113@gmail.com';
		$subject = 'Register';
		$message = '<html> Please click <a href="'.$loginSignupUrl.'?'.$colLoginSignup.'=2&'.$colEmailId.'='.$colEmailIdVal.'&'.$colVerifyCode.'='.$colVerifyCodeVal.'">this link</a> </html>';
		$from = 'nishi@nishiagarwal.in';
		$retSendMail = sendMail($to, $subject, $message, $from);
		if(!$retSendMail)
		{
			return 3;
		}

		$query = 'INSERT INTO  `'.$dbName.'`.`'.$userTableName.'` (
					`'.$colEmailId.'` ,
					`'.$colPassword.'` ,
					`'.$colFullName.'`,
					`'.$colVerifyCode.'`
					)
					VALUES (
						"'.$colEmailIdVal.'",  "'.$colPasswordVal.'",  "'.$colFullNameVal.'",  "'.$colVerifyCodeVal.'"
					)';

		if(@mysql_query($query))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function checkUserDetails($colEmailIdVal, $colPasswordVal)
	{
		global $dbName, $userTableName, $colVerified, $colEmailId, $colVerifyCode;

		//Check if already registered
		$retCheckRegistered = checkRegistered($colEmailIdVal);
		if($retCheckRegistered == 0)
		{
			return 0;
		}

		//Check if verified
		$retCheckVerified = checkVerified($colEmailIdVal);
		if($retCheckVerified == 0)
		{
			return 2;
		}

		//Check if emailId and password is correct
		$retCheckEmailIdPwd = checkEmailIdPwd($colEmailIdVal, $colPasswordVal);
		if($retCheckEmailIdPwd == 1) //emailId and password is correct
		{
			return 1;
		}
		elseif($retCheckEmailIdPwd == 2) //emailId or password is wrong
		{
			return 4;
		}
		else // something went wrong
		{
			return 3;
		}
	}

	function updateVerify($colEmailIdVal, $colVerifyCodeVal)
	{
		global $userTableName, $colVerified, $colEmailId, $colVerifyCode;
		$query= 'update `'.$userTableName.'` set `'.$colVerified.'` = "1" where `'.$colEmailId.'` = "'.$colEmailIdVal.'" and `'.$colVerifyCode.'` = "'.$colVerifyCodeVal.'"';
		
		if(@mysql_query($query))
		{
			return 1;
		}
		else
		{
			echo $query;
			echo mysql_error();
			return 0;
		}
	}

	function addPwdVerifyCode($colVerifyCodeVal, $colEmailIdVal)
	{
		global $dbName, $forgotChangePwdTable, $colPwdVerifyCode, $colEmailId;

		$query = 'INSERT INTO  `'.$dbName.'`.`'.$forgotChangePwdTable.'` (
					`'.$colPwdVerifyCode.'` ,
					`'.$colEmailId.'`
					)
					VALUES (
						"'.$colVerifyCodeVal.'",  "'.$colEmailIdVal.'"
					)';

		if(@mysql_query($query))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function updatePwd($colPwdVerifyCodeVal, $colPasswordVal)
	{
		global $dbName, $userTableName, $forgotChangePwdTable, $colPwdVerifyCode, $colEmailId, $colPassword;

		$query = 'select `'. $colEmailId.'` from `'.$forgotChangePwdTable.'` where `'.$colPwdVerifyCode.'` = "'.$colPwdVerifyCodeVal.'"';
		$colEmailIdVal = NULL;
		if(@$query_run= mysql_query($query))
		{
			while(@$query_row= mysql_fetch_assoc($query_run))
			{
				$colEmailIdVal = $query_row[$colEmailId];
			}
		}	

		if(is_null($colEmailIdVal))
		{//$colPwdVerifyCode is not present in db
			return 2;
		}
		else
		{//$colPwdVerifyCode is present in db
			$query= 'update `'.$userTableName.'` set `'.$colPassword.'` = "'.$colPasswordVal.'" where `'.$colEmailId.'` = "'.$colEmailIdVal.'"';
			
			if(@mysql_query($query))
			{//Update done
				return 1;
			}
			else
			{//Could not be updated
				echo $query;
				echo mysql_error();
				return 3;
			}
		}
	}
?>