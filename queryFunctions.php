<?php 
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
?>