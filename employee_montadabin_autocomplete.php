<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

require_once("include/employee_montadabin_variables.php");


$field = postvalue('field');
$value = postvalue('value');
$pageType = postvalue('pageType');

	if( !isLogged() ) 
		return;	
	if( !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Edit") && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Add") && !CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search") ) 
		return;


$mode = intval(postvalue('mode'));

$cipherer = new RunnerCipherer($strTableName);
$pSet = new ProjectSettings($strTableName, $pageType);

include_once getabspath("classes/controls/EditControlsContainer.php");
$editControls = new EditControlsContainer(null, $pSet, $pageType, $cipherer);
$control = $editControls->getControl($field);

// if no parent
if (postvalue('isExistParent') === '0')
{
	if ($mode == MODE_SEARCH || $mode == MODE_INLINE_ADD || $mode == MODE_ADD)
	{
		$output = $control->loadLookupContent('', '', false, false); 
	}
	elseif ($mode == MODE_EDIT || $mode == MODE_INLINE_EDIT)
	{
		$output = $control->loadLookupContent('', '', false, false); 
	}
	else	
		$output = $control->loadLookupContent($value, '', true, false); 
}
// if exist parent
else if(postvalue('isExistParent') === '1' && $value==='')
{
	if ($mode == MODE_SEARCH)
	{
		$output = $control->loadLookupContent('', '', false, false);
	}
	elseif ($mode == MODE_EDIT || $mode == MODE_INLINE_EDIT || $mode == MODE_INLINE_ADD || $mode == MODE_ADD)
	{
		echo printJSON(array('success'=>true, 'data'=>''));
		exit();
	}
	else 
		$output = $control->loadLookupContent($value, '', true, false);		
}
else
	$output = $control->loadLookupContent($value, '', true, false);	


$respObj = array('success'=>true, 'data'=>$output);
echo printJSON($respObj);
exit();
?>