<?php  

	function debugToConsole($dataTag, $data) 
	{
	    if(is_array($data) || is_object($data))
		{
			$data = json_encode($data);
		}

		echo("<script>console.log('PHP: ".$dataTag." : ".$data."');</script>");
	}
	function getPhotoHref($photoName)
	{
		global $onePhotoBlogPhp, $colName;
		$retHref = $onePhotoBlogPhp.'?'.$colName.'='.$photoName;
		//debugToConsole("getPhotoHref", $retHref);
		return $retHref;
	}

	function getPhotoSrc($photoFileNameVal)
	{
		global $photoDir;
		$retSrc = $photoDir.'/'.$photoFileNameVal;
		//debugToConsole("getPhotoSrc", $retSrc);
		return $retSrc;
	}

	function addOnePhoto($photoRow)
	{
		global $colName, $colDescription, $colPhotoFileName;
		$retOnePhoto = '<div class="height-100 col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="thumbnail">
							<a href="'.getPhotoHref($photoRow[$colName]).'">
								<div> 
									<img src="'.getPhotoSrc($photoRow[$colPhotoFileName]).'" class="thumbnail-img">
								</div>
								<div class="caption thumbnail-body" >
									<div><h4><span>'.$photoRow[$colName].'</span></h4></div>
									<div>
										<p><span>'.$photoRow[$colDescription].'</span></p>
									</div>
								</div>
							</a>
						</div>
					</div>';

		return $retOnePhoto;
	}

	function addPhotoRow($photosArray, $startIdx, $noOfPhotosInRow)
	{
		$lastIdx = min(count($photosArray), $startIdx + $noOfPhotosInRow);
		$retPhotoRow = '<div class="row thumbnail-div">';
		for($i=$startIdx;$i<$lastIdx;++$i)
		{
			$retPhotoRow = $retPhotoRow.addOnePhoto($photosArray[$i]);
		}

		$retPhotoRow = $retPhotoRow.'</div>';

		return $retPhotoRow;
	}


	function sendPwdVerifyCode($colEmailIdVal)
	{
		global $forgotChangePwdUrl, $sendPwdVerifyCode, $colPwdVerifyCode, $sendPwdVerifyCodeVal;

		//send Mail
		$colPwdVerifyCodeVal = generateRandomString();
		
		$retAddPwdVerifyCode = addPwdVerifyCode($colPwdVerifyCodeVal, $colEmailIdVal);
		
		$to = 'agarwalvivek113@gmail.com';
		$subject = 'Password change';
		$message = '<html> Please click <a href="'.$forgotChangePwdUrl.'?'.$sendPwdVerifyCode.'=2&'.$colPwdVerifyCode.'='.$colPwdVerifyCodeVal.'">this link</a> </html>';
		$from = 'nishi@nishiagarwal.in';
		$retSendMail = sendMail($to, $subject, $message, $from);
		if(!$retSendMail)
		{//Mail couldnot be sent
			return 3;
		}

		if($retAddPwdVerifyCode == 1)
		{//PwdVerifyCode added to db
			return 1;
		}
		else
		{//Could not add PwdVerifyCode to db
			return 2;
		}
	}


?>