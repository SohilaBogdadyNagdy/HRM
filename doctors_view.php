<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
require_once("include/doctors_variables.php");
require_once('include/xtempl.php');
require_once('classes/viewpage.php');
require_once("classes/searchclause.php");

add_nocache_headers();

$pageMode = ViewPage::readViewModeFromRequest();

if( !Security::processPageSecurity( $strTableName, "S", $pageMode != VIEW_SIMPLE ) )
	return;




$layout = new TLayout("view21", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["top"] = array();
$layout->containers["hmenu"] = array();
$layout->container_properties["hmenu"] = array(  );
$layout->containers["hmenu"][] = array("name"=>"hmenu", 
	"block"=>"menu_block", "substyle"=>1  );

$layout->skins["hmenu"] = "undermenu";

$layout->blocks["top"][] = "hmenu";
$layout->containers["all"] = array();
$layout->container_properties["all"] = array(  );
$layout->containers["all"][] = array("name"=>"wrapper", 
	"block"=>"", "substyle"=>1 , "container"=>"main" );
$layout->containers["main"] = array();
$layout->container_properties["main"] = array(  );
$layout->containers["main"][] = array("name"=>"wrapper", 
	"block"=>"", "substyle"=>1 , "container"=>"view" );
$layout->containers["view"] = array();
$layout->container_properties["view"] = array(  );
$layout->containers["view"][] = array("name"=>"viewheader", 
	"block"=>"viewheader", "substyle"=>2  );

$layout->containers["view"][] = array("name"=>"wrapper", 
	"block"=>"", "substyle"=>1 , "container"=>"fields" );
$layout->containers["fields"] = array();
$layout->container_properties["fields"] = array(  );
$layout->containers["fields"][] = array("name"=>"viewfields", 
	"block"=>"", "substyle"=>1  );

$layout->containers["fields"][] = array("name"=>"viewbuttons", 
	"block"=>"viewbuttons", "substyle"=>2  );

$layout->skins["fields"] = "fields";


$layout->skins["view"] = "1";


$layout->skins["main"] = "empty";


$layout->skins["all"] = "empty";

$layout->blocks["top"][] = "all";
$page_layouts["doctors_view"] = $layout;

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







$xt = new Xtempl();

//Set page id
$id = postvalue("id");
$id = intval($id) == 0 ? 1 : $id;

// $keys could not be set properly if editid params were no passed
$keys = array();
$keys["Doctors_ID"] = postvalue("editid1");

//array of params for classes
$params = array();
$params["id"] = $id;
$params["xt"] = &$xt;
$params["keys"] = $keys;
$params["mode"] = $pageMode;
$params["pageType"] = PAGE_VIEW;
$params["tName"] = $strTableName;
$params["pdfMode"] = postvalue("pdf") !== "";

if( $pageMode == VIEW_DASHBOARD ) 
{
	$params["dashElementName"] = postvalue("dashelement");
	$params["dashTName"] = postvalue("table");
} 

$pageObject = new ViewPage($params);
$pageObject->init();

$pageObject->process();

?>