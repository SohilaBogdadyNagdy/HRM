<?php 
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
require_once("include/academic_source_variables.php");
require_once('include/xtempl.php');
require_once('classes/addpage.php');
require_once('include/lookuplinks.php');
require_once("classes/searchclause.php");

add_nocache_headers();

InitLookupLinks();

if( !AddPage::processAddPageSecurity( $strTableName ) )
	return;

AddPage::handleBrokenRequest();




$layout = new TLayout("add31", "Office1Avenue2", "MobileAvenue2");
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
	"block"=>"", "substyle"=>1 , "container"=>"add" );
$layout->containers["add"] = array();
$layout->container_properties["add"] = array(  );
$layout->containers["add"][] = array("name"=>"addheader", 
	"block"=>"addheader", "substyle"=>2  );

$layout->containers["add"][] = array("name"=>"message", 
	"block"=>"message_block", "substyle"=>1  );

$layout->containers["add"][] = array("name"=>"wrapper", 
	"block"=>"", "substyle"=>1 , "container"=>"fields" );
$layout->containers["fields"] = array();
$layout->container_properties["fields"] = array(  );
$layout->containers["fields"][] = array("name"=>"addfields", 
	"block"=>"", "substyle"=>1  );

$layout->containers["fields"][] = array("name"=>"addbuttons", 
	"block"=>"addbuttons", "substyle"=>2  );

$layout->skins["fields"] = "fields";


$layout->skins["add"] = "1";


$layout->skins["all"] = "empty";

$layout->blocks["top"][] = "all";
$page_layouts["academic_source_add"] = $layout;

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




$pageMode = AddPage::readAddModeFromRequest();

$xt = new Xtempl();

$id = postvalue("id");
$id = intval($id) == 0 ? 1 : $id;
	 	
//an array of AddPage constructor's params 
$params = array();
$params["id"] = $id;
$params["xt"] = &$xt;
$params["mode"] = $pageMode;
$params["pageType"] = PAGE_ADD;
$params["tName"] = $strTableName;
$params["action"] = postvalue("a");
$params["needSearchClauseObj"] = false;
$params["baseTableName"] = postvalue("table");
$params["afterAdd_id"] = postvalue("afteradd");
$params["masterTable"] = postvalue("mastertable");

if( $pageMode == ADD_INLINE )
{
	// Inline add in a 'List page with search' lookup
	$params["forListPageWithSearch"] = postvalue('forLookup');
	
	$params["screenWidth"] = postvalue("screenWidth");
	$params["screenHeight"] = postvalue("screenHeight");
	$params["orientation"] = postvalue("orientation");
	
	$params["masterPageType"] = postvalue("mainMPageType");
}	

if( $pageMode == ADD_ONTHEFLY || $pageMode == ADD_INLINE && (postvalue('forLookup') || postvalue("category")) )	
{
	//table where lookup is set
	$params["mainTable"] = postvalue("table");
	//field with lookup is set	
	$params["mainField"] = postvalue("field");
	 //the ptype od the page where lookup is set
	$params["mainPageType"] = postvalue("pageType");

	//the parent control value
	$params["category"] = postvalue("category");
}

if( $pageMode == ADD_DASHBOARD ) 
{
	$params["dashElementName"] = postvalue("dashelement");
	$params["dashTName"] = postvalue("table");
}
	
$pageObject = new AddPage($params);
$pageObject->init();

$pageObject->process();	
?>