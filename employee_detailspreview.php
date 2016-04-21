<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

require_once("include/employee_variables.php");

$mode = postvalue("mode");

if(!isLogged())
{ 
	return;
}
if(!CheckSecurity(@$_SESSION["_".$strTableName."_OwnerID"],"Search"))
{
	return;
}

require_once("classes/searchclause.php");

$cipherer = new RunnerCipherer($strTableName);

require_once('include/xtempl.php');
$xt = new Xtempl();





$layout = new TLayout("detailspreview", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();
$layout->container_properties["dcount"] = array(  );
$layout->containers["dcount"][] = array("name"=>"detailspreviewheader", 
	"block"=>"", "substyle"=>1  );

$layout->containers["dcount"][] = array("name"=>"detailspreviewdetailsfount", 
	"block"=>"", "substyle"=>1  );

$layout->containers["dcount"][] = array("name"=>"detailspreviewdispfirst", 
	"block"=>"display_first", "substyle"=>1  );

$layout->skins["dcount"] = "empty";

$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();
$layout->container_properties["detailspreviewgrid"] = array(  );
$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields", 
	"block"=>"details_data", "substyle"=>1  );

$layout->skins["detailspreviewgrid"] = "grid";

$layout->blocks["bare"][] = "detailspreviewgrid";
$page_layouts["employee_detailspreview"] = $layout;

$layout->skinsparams = array();
$layout->skinsparams["empty"] = array("button"=>"button2");
$layout->skinsparams["menu"] = array("button"=>"button1");
$layout->skinsparams["hmenu"] = array("button"=>"button1");
$layout->skinsparams["undermenu"] = array("button"=>"button1");
$layout->skinsparams["fields"] = array("button"=>"button1");
$layout->skinsparams["form"] = array("button"=>"button1");
$layout->skinsparams["1"] = array("button"=>"button1");
$layout->skinsparams["2"] = array("button"=>"button1");
$layout->skinsparams["3"] = array("button"=>"button1");



$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
if($mastertable != "")
{
	$_SESSION[$strTableName."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys) && count($masterKeys) > 0)
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$strTableName."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$strTableName."_masterkey".$i]))
		unset($_SESSION[$strTableName."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$strTableName."_mastertable"];

$params = array();
$params['id'] = 1;
$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params['pageType'] = "detailspreview";
$pageObject = new RunnerPage($params);

if($mastertable == "work palce")
{
	$where = "";
		$where .= $pageObject->getFieldSQLDecrypt("Main work place") . "=" . make_db_value("Main work place",$_SESSION[$strTableName."_masterkey1"]);
}

$str = SecuritySQL("Search");
if(strlen($str))
	$where.=" and ".$str;
$strSQL = $gQuery->gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount = $gQuery->gSQLRowCount($where, $pageObject->connection);
$xt->assign("row_count",$rowcount);
if($rowcount) 
{
	$xt->assign("details_data",true);

	$display_count = 5;
	if($mode == "inline")
		$display_count*=2;
		
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	require_once getabspath('classes/controls/ViewControlsContainer.php');
	$pSet = new ProjectSettings($strTableName, PAGE_LIST);
	$viewContainer = new ViewControlsContainer($pSet, PAGE_LIST);
	$viewContainer->isDetailsPreview = true;

	$b = true;
	$qResult = $pageObject->connection->query( $strSQL );
	$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
		$keylink.="&key1=".runner_htmlspecialchars(rawurlencode(@$data["Id"]));
	
	
	//	Id - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Id", $data, $keylink);
			$row["Id_value"] = $value;
			$format = $pSet->getViewFormat("Id");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Id")))
				$class = ' rnr-field-number';
			$row["Id_class"] = $class;
	//	Name - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Name", $data, $keylink);
			$row["Name_value"] = $value;
			$format = $pSet->getViewFormat("Name");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Name")))
				$class = ' rnr-field-number';
			$row["Name_class"] = $class;
	//	Sector - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Sector", $data, $keylink);
			$row["Sector_value"] = $value;
			$format = $pSet->getViewFormat("Sector");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Sector")))
				$class = ' rnr-field-number';
			$row["Sector_class"] = $class;
	//	Creat Data - Datetime
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Creat Data", $data, $keylink);
			$row["Creat_Data_value"] = $value;
			$format = $pSet->getViewFormat("Creat Data");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Creat Data")))
				$class = ' rnr-field-number';
			$row["Creat_Data_class"] = $class;
	//	Modificat Date - Datetime
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Modificat Date", $data, $keylink);
			$row["Modificat_Date_value"] = $value;
			$format = $pSet->getViewFormat("Modificat Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Modificat Date")))
				$class = ' rnr-field-number';
			$row["Modificat_Date_class"] = $class;
	//	National ID - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("National ID", $data, $keylink);
			$row["National_ID_value"] = $value;
			$format = $pSet->getViewFormat("National ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("National ID")))
				$class = ' rnr-field-number';
			$row["National_ID_class"] = $class;
	//	Insurance ID - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Insurance ID", $data, $keylink);
			$row["Insurance_ID_value"] = $value;
			$format = $pSet->getViewFormat("Insurance ID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Insurance ID")))
				$class = ' rnr-field-number';
			$row["Insurance_ID_class"] = $class;
	//	gender - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("gender", $data, $keylink);
			$row["gender_value"] = $value;
			$format = $pSet->getViewFormat("gender");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("gender")))
				$class = ' rnr-field-number';
			$row["gender_class"] = $class;
	//	birthday - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("birthday", $data, $keylink);
			$row["birthday_value"] = $value;
			$format = $pSet->getViewFormat("birthday");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("birthday")))
				$class = ' rnr-field-number';
			$row["birthday_class"] = $class;
	//	Phone - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Phone", $data, $keylink);
			$row["Phone_value"] = $value;
			$format = $pSet->getViewFormat("Phone");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Phone")))
				$class = ' rnr-field-number';
			$row["Phone_class"] = $class;
	//	Email - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Email", $data, $keylink);
			$row["Email_value"] = $value;
			$format = $pSet->getViewFormat("Email");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Email")))
				$class = ' rnr-field-number';
			$row["Email_class"] = $class;
	//	Address - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Address", $data, $keylink);
			$row["Address_value"] = $value;
			$format = $pSet->getViewFormat("Address");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Address")))
				$class = ' rnr-field-number';
			$row["Address_class"] = $class;
	//	Contract State - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Contract State", $data, $keylink);
			$row["Contract_State_value"] = $value;
			$format = $pSet->getViewFormat("Contract State");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Contract State")))
				$class = ' rnr-field-number';
			$row["Contract_State_class"] = $class;
	//	Onus Date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Onus Date", $data, $keylink);
			$row["Onus_Date_value"] = $value;
			$format = $pSet->getViewFormat("Onus Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Onus Date")))
				$class = ' rnr-field-number';
			$row["Onus_Date_class"] = $class;
	//	Contract Date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Contract Date", $data, $keylink);
			$row["Contract_Date_value"] = $value;
			$format = $pSet->getViewFormat("Contract Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Contract Date")))
				$class = ' rnr-field-number';
			$row["Contract_Date_class"] = $class;
	//	Cotract No - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Cotract No", $data, $keylink);
			$row["Cotract_No_value"] = $value;
			$format = $pSet->getViewFormat("Cotract No");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Cotract No")))
				$class = ' rnr-field-number';
			$row["Cotract_No_class"] = $class;
	//	Start work Date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Start work Date", $data, $keylink);
			$row["Start_work_Date_value"] = $value;
			$format = $pSet->getViewFormat("Start work Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Start work Date")))
				$class = ' rnr-field-number';
			$row["Start_work_Date_class"] = $class;
	//	Academic Qqualification - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Academic Qqualification", $data, $keylink);
			$row["Academic_Qqualification_value"] = $value;
			$format = $pSet->getViewFormat("Academic Qqualification");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Academic Qqualification")))
				$class = ' rnr-field-number';
			$row["Academic_Qqualification_class"] = $class;
	//	Specialization - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Specialization", $data, $keylink);
			$row["Specialization_value"] = $value;
			$format = $pSet->getViewFormat("Specialization");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Specialization")))
				$class = ' rnr-field-number';
			$row["Specialization_class"] = $class;
	//	Source - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Source", $data, $keylink);
			$row["Source_value"] = $value;
			$format = $pSet->getViewFormat("Source");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Source")))
				$class = ' rnr-field-number';
			$row["Source_class"] = $class;
	//	Date of Academic - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Date of Academic", $data, $keylink);
			$row["Date_of_Academic_value"] = $value;
			$format = $pSet->getViewFormat("Date of Academic");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Date of Academic")))
				$class = ' rnr-field-number';
			$row["Date_of_Academic_class"] = $class;
	//	Source of Primary certificate - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Source of Primary certificate", $data, $keylink);
			$row["Source_of_Primary_certificate_value"] = $value;
			$format = $pSet->getViewFormat("Source of Primary certificate");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Source of Primary certificate")))
				$class = ' rnr-field-number';
			$row["Source_of_Primary_certificate_class"] = $class;
	//	Source of Junior certificate - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Source of Junior certificate", $data, $keylink);
			$row["Source_of_Junior_certificate_value"] = $value;
			$format = $pSet->getViewFormat("Source of Junior certificate");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Source of Junior certificate")))
				$class = ' rnr-field-number';
			$row["Source_of_Junior_certificate_class"] = $class;
	//	Opject Group - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Opject Group", $data, $keylink);
			$row["Opject_Group_value"] = $value;
			$format = $pSet->getViewFormat("Opject Group");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Opject Group")))
				$class = ' rnr-field-number';
			$row["Opject_Group_class"] = $class;
	//	Job title - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Job title", $data, $keylink);
			$row["Job_title_value"] = $value;
			$format = $pSet->getViewFormat("Job title");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Job title")))
				$class = ' rnr-field-number';
			$row["Job_title_class"] = $class;
	//	Financial class - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Financial class", $data, $keylink);
			$row["Financial_class_value"] = $value;
			$format = $pSet->getViewFormat("Financial class");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Financial class")))
				$class = ' rnr-field-number';
			$row["Financial_class_class"] = $class;
	//	Creat By - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Creat By", $data, $keylink);
			$row["Creat_By_value"] = $value;
			$format = $pSet->getViewFormat("Creat By");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Creat By")))
				$class = ' rnr-field-number';
			$row["Creat_By_class"] = $class;
	//	Sector 3 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Sector 3", $data, $keylink);
			$row["Sector_3_value"] = $value;
			$format = $pSet->getViewFormat("Sector 3");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Sector 3")))
				$class = ' rnr-field-number';
			$row["Sector_3_class"] = $class;
	//	Deprtment - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Deprtment", $data, $keylink);
			$row["Deprtment_value"] = $value;
			$format = $pSet->getViewFormat("Deprtment");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Deprtment")))
				$class = ' rnr-field-number';
			$row["Deprtment_class"] = $class;
	//	Technical Jop - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Technical Jop", $data, $keylink);
			$row["Technical_Jop_value"] = $value;
			$format = $pSet->getViewFormat("Technical Jop");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Technical Jop")))
				$class = ' rnr-field-number';
			$row["Technical_Jop_class"] = $class;
	//	Administration Job - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Administration Job", $data, $keylink);
			$row["Administration_Job_value"] = $value;
			$format = $pSet->getViewFormat("Administration Job");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Administration Job")))
				$class = ' rnr-field-number';
			$row["Administration_Job_class"] = $class;
	//	Date of Now Job - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Date of Now Job", $data, $keylink);
			$row["Date_of_Now_Job_value"] = $value;
			$format = $pSet->getViewFormat("Date of Now Job");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Date of Now Job")))
				$class = ' rnr-field-number';
			$row["Date_of_Now_Job_class"] = $class;
	//	Financial class 2 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Financial class 2", $data, $keylink);
			$row["Financial_class_2_value"] = $value;
			$format = $pSet->getViewFormat("Financial class 2");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Financial class 2")))
				$class = ' rnr-field-number';
			$row["Financial_class_2_class"] = $class;
	//	Date of Now F C - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Date of Now F C", $data, $keylink);
			$row["Date_of_Now_F_C_value"] = $value;
			$format = $pSet->getViewFormat("Date of Now F C");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Date of Now F C")))
				$class = ' rnr-field-number';
			$row["Date_of_Now_F_C_class"] = $class;
	//	Now Acadmic - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Now Acadmic", $data, $keylink);
			$row["Now_Acadmic_value"] = $value;
			$format = $pSet->getViewFormat("Now Acadmic");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Now Acadmic")))
				$class = ' rnr-field-number';
			$row["Now_Acadmic_class"] = $class;
	//	Date of Now Aca - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Date of Now Aca", $data, $keylink);
			$row["Date_of_Now_Aca_value"] = $value;
			$format = $pSet->getViewFormat("Date of Now Aca");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Date of Now Aca")))
				$class = ' rnr-field-number';
			$row["Date_of_Now_Aca_class"] = $class;
	//	Employment Status - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Employment Status", $data, $keylink);
			$row["Employment_Status_value"] = $value;
			$format = $pSet->getViewFormat("Employment Status");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Employment Status")))
				$class = ' rnr-field-number';
			$row["Employment_Status_class"] = $class;
	//	First_N - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("First_N", $data, $keylink);
			$row["First_N_value"] = $value;
			$format = $pSet->getViewFormat("First_N");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("First_N")))
				$class = ' rnr-field-number';
			$row["First_N_class"] = $class;
	//	Scand_N - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Scand_N", $data, $keylink);
			$row["Scand_N_value"] = $value;
			$format = $pSet->getViewFormat("Scand_N");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Scand_N")))
				$class = ' rnr-field-number';
			$row["Scand_N_class"] = $class;
	//	Third_N - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Third_N", $data, $keylink);
			$row["Third_N_value"] = $value;
			$format = $pSet->getViewFormat("Third_N");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Third_N")))
				$class = ' rnr-field-number';
			$row["Third_N_class"] = $class;
	//	Association No - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Association No", $data, $keylink);
			$row["Association_No_value"] = $value;
			$format = $pSet->getViewFormat("Association No");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Association No")))
				$class = ' rnr-field-number';
			$row["Association_No_class"] = $class;
	//	profession No - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("profession No", $data, $keylink);
			$row["profession_No_value"] = $value;
			$format = $pSet->getViewFormat("profession No");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("profession No")))
				$class = ' rnr-field-number';
			$row["profession_No_class"] = $class;
	//	Movement procuratorates Date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Movement procuratorates Date", $data, $keylink);
			$row["Movement_procuratorates_Date_value"] = $value;
			$format = $pSet->getViewFormat("Movement procuratorates Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Movement procuratorates Date")))
				$class = ' rnr-field-number';
			$row["Movement_procuratorates_Date_class"] = $class;
	//	Have it Date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Have it Date", $data, $keylink);
			$row["Have_it_Date_value"] = $value;
			$format = $pSet->getViewFormat("Have it Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Have it Date")))
				$class = ' rnr-field-number';
			$row["Have_it_Date_class"] = $class;
	//	Imiage - File-based Image
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Imiage", $data, $keylink);
			$row["Imiage_value"] = $value;
			$format = $pSet->getViewFormat("Imiage");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Imiage")))
				$class = ' rnr-field-number';
			$row["Imiage_class"] = $class;
	//	not_need - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("not_need", $data, $keylink);
			$row["not_need_value"] = $value;
			$format = $pSet->getViewFormat("not_need");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("not_need")))
				$class = ' rnr-field-number';
			$row["not_need_class"] = $class;
	//	STATE - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("STATE", $data, $keylink);
			$row["STATE_value"] = $value;
			$format = $pSet->getViewFormat("STATE");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("STATE")))
				$class = ' rnr-field-number';
			$row["STATE_class"] = $class;
	//	out_code - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("out_code", $data, $keylink);
			$row["out_code_value"] = $value;
			$format = $pSet->getViewFormat("out_code");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("out_code")))
				$class = ' rnr-field-number';
			$row["out_code_class"] = $class;
	//	out_Date - Short Date
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("out_Date", $data, $keylink);
			$row["out_Date_value"] = $value;
			$format = $pSet->getViewFormat("out_Date");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("out_Date")))
				$class = ' rnr-field-number';
			$row["out_Date_class"] = $class;
	//	mstatus - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mstatus", $data, $keylink);
			$row["mstatus_value"] = $value;
			$format = $pSet->getViewFormat("mstatus");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mstatus")))
				$class = ' rnr-field-number';
			$row["mstatus_class"] = $class;
	//	Serv Debartment - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Serv Debartment", $data, $keylink);
			$row["Serv_Debartment_value"] = $value;
			$format = $pSet->getViewFormat("Serv Debartment");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Serv Debartment")))
				$class = ' rnr-field-number';
			$row["Serv_Debartment_class"] = $class;
	//	comment - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("comment", $data, $keylink);
			$row["comment_value"] = $value;
			$format = $pSet->getViewFormat("comment");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("comment")))
				$class = ' rnr-field-number';
			$row["comment_class"] = $class;
	//	Main work place - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Main work place", $data, $keylink);
			$row["Main_work_place_value"] = $value;
			$format = $pSet->getViewFormat("Main work place");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Main work place")))
				$class = ' rnr-field-number';
			$row["Main_work_place_class"] = $class;
	//	Balance B - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Balance B", $data, $keylink);
			$row["Balance_B_value"] = $value;
			$format = $pSet->getViewFormat("Balance B");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Balance B")))
				$class = ' rnr-field-number';
			$row["Balance_B_class"] = $class;
	//	Balance A - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Balance A", $data, $keylink);
			$row["Balance_A_value"] = $value;
			$format = $pSet->getViewFormat("Balance A");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Balance A")))
				$class = ' rnr-field-number';
			$row["Balance_A_class"] = $class;
	//	GroupID - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("GroupID", $data, $keylink);
			$row["GroupID_value"] = $value;
			$format = $pSet->getViewFormat("GroupID");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("GroupID")))
				$class = ' rnr-field-number';
			$row["GroupID_class"] = $class;
	//	Vacation Year - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Vacation Year", $data, $keylink);
			$row["Vacation_Year_value"] = $value;
			$format = $pSet->getViewFormat("Vacation Year");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Vacation Year")))
				$class = ' rnr-field-number';
			$row["Vacation_Year_class"] = $class;
	//	Fourth_N - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Fourth_N", $data, $keylink);
			$row["Fourth_N_value"] = $value;
			$format = $pSet->getViewFormat("Fourth_N");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Fourth_N")))
				$class = ' rnr-field-number';
			$row["Fourth_N_class"] = $class;
	//	Job Title1 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Job Title1", $data, $keylink);
			$row["Job_Title1_value"] = $value;
			$format = $pSet->getViewFormat("Job Title1");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Job Title1")))
				$class = ' rnr-field-number';
			$row["Job_Title1_class"] = $class;
	//	Job Title2 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("Job Title2", $data, $keylink);
			$row["Job_Title2_value"] = $value;
			$format = $pSet->getViewFormat("Job Title2");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("Job Title2")))
				$class = ' rnr-field-number';
			$row["Job_Title2_class"] = $class;
	//	mang_desc_number - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mang_desc_number", $data, $keylink);
			$row["mang_desc_number_value"] = $value;
			$format = $pSet->getViewFormat("mang_desc_number");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mang_desc_number")))
				$class = ' rnr-field-number';
			$row["mang_desc_number_class"] = $class;
	//	mang_desc_sorce - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mang_desc_sorce", $data, $keylink);
			$row["mang_desc_sorce_value"] = $value;
			$format = $pSet->getViewFormat("mang_desc_sorce");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mang_desc_sorce")))
				$class = ' rnr-field-number';
			$row["mang_desc_sorce_class"] = $class;
	//	INstatus8 - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("INstatus8", $data, $keylink);
			$row["INstatus8_value"] = $value;
			$format = $pSet->getViewFormat("INstatus8");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("INstatus8")))
				$class = ' rnr-field-number';
			$row["INstatus8_class"] = $class;
	//	visa_number - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("visa_number", $data, $keylink);
			$row["visa_number_value"] = $value;
			$format = $pSet->getViewFormat("visa_number");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("visa_number")))
				$class = ' rnr-field-number';
			$row["visa_number_class"] = $class;
	//	T_degree - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("T_degree", $data, $keylink);
			$row["T_degree_value"] = $value;
			$format = $pSet->getViewFormat("T_degree");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("T_degree")))
				$class = ' rnr-field-number';
			$row["T_degree_class"] = $class;
		$rowinfo[] = $row;
		if ($b) {
			$rowinfo2[] = $row;
			$b = false;
		}
		$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	}
	$xt->assign_loopsection("details_row",$rowinfo);
	$xt->assign_loopsection("details_row_header",$rowinfo2); // assign class for header
}
$returnJSON = array("success" => true);
$xt->load_template(GetTemplateName("employee", "detailspreview"));
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline")
{
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		foreach($layout->getCSSFiles(isRTL(), isMobile()) as $css)
		{
			$returnJSON['CSSFiles'][] = $css;
		}
	}	
}	

echo printJSON($returnJSON);
exit();
?>