<?php 

@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
require_once("include/employee_variables.php");
require_once('include/xtempl.php');
require_once('classes/editpage.php');
require_once("classes/searchclause.php");

add_nocache_headers();

if( !EditPage::processEditPageSecurity( $strTableName ) )
	return;

EditPage::handleBrokenRequest();

//	render all necessary layouts




$layout = new TLayout("edit21", "Office1Avenue2", "MobileAvenue2");
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
	"block"=>"", "substyle"=>1 , "container"=>"edit" );
$layout->containers["edit"] = array();
$layout->container_properties["edit"] = array(  );
$layout->containers["edit"][] = array("name"=>"editheader", 
	"block"=>"editheader", "substyle"=>2  );

$layout->containers["edit"][] = array("name"=>"message", 
	"block"=>"message_block", "substyle"=>1  );

$layout->containers["edit"][] = array("name"=>"wrapper", 
	"block"=>"", "substyle"=>1 , "container"=>"fields" );
$layout->containers["fields"] = array();
$layout->container_properties["fields"] = array(  );
$layout->containers["fields"][] = array("name"=>"editfields", 
	"block"=>"", "substyle"=>1  );

$layout->containers["fields"][] = array("name"=>"editbuttons", 
	"block"=>"editbuttons", "substyle"=>2  );

$layout->skins["fields"] = "fields";


$layout->skins["edit"] = "1";


$layout->containers["all"][] = array("name"=>"wrapper", 
	"block"=>"", "substyle"=>1 , "container"=>"details" );
$layout->containers["details"] = array();
$layout->container_properties["details"] = array(  );
$layout->containers["details"][] = array("name"=>"editdetails", 
	"block"=>"detail_tables", "substyle"=>1  );

$layout->skins["details"] = "empty";


$layout->skins["all"] = "empty";

$layout->blocks["top"][] = "all";
$page_layouts["employee_edit"] = $layout;

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






$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit_________________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit___________________________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit____________________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit_______________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit_____________________________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit_____________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit_________1"] = $layout;

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





$layout = new TLayout("tab", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["1"] = array();
$layout->container_properties["1"] = array(  );
$layout->containers["1"][] = array("name"=>"addtabfield", 
	"block"=>"", "substyle"=>1  );

$layout->skins["1"] = "empty";

$layout->blocks["bare"][] = "1";
$page_layouts["employee_edit____________1"] = $layout;

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



	
						


$layout = new TLayout("centered_hor1", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["center"] = array();
$layout->containers["recordcontrols"] = array();
$layout->container_properties["recordcontrols"] = array(  );
$layout->containers["recordcontrols"][] = array("name"=>"recordcontrols_new", 
	"block"=>"newrecord_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"recordcontrol", 
	"block"=>"record_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"toplinks", 
	"block"=>"more_list", "substyle"=>1  );

$layout->skins["recordcontrols"] = "2";

$layout->blocks["center"][] = "recordcontrols";
$layout->containers["message"] = array();
$layout->container_properties["message"] = array(  );
$layout->containers["message"][] = array("name"=>"message", 
	"block"=>"message_block", "substyle"=>1  );

$layout->skins["message"] = "2";

$layout->blocks["center"][] = "message";
$layout->containers["pagination"] = array();
$layout->container_properties["pagination"] = array(  );
$layout->containers["pagination"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination"] = "2";

$layout->blocks["center"][] = "pagination";
$layout->containers["grid"] = array();
$layout->container_properties["grid"] = array(  );
$layout->containers["grid"][] = array("name"=>"grid", 
	"block"=>"grid_block", "substyle"=>1  );

$layout->skins["grid"] = "grid";

$layout->blocks["center"][] = "grid";
$layout->containers["pagination_bottom"] = array();
$layout->container_properties["pagination_bottom"] = array(  );
$layout->containers["pagination_bottom"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination_bottom"] = "2";

$layout->blocks["center"][] = "pagination_bottom";
$layout->blocks["left"] = array();
$layout->containers["left"] = array();
$layout->container_properties["left"] = array(  );
$layout->containers["left"][] = array("name"=>"searchpanel", 
	"block"=>"searchPanel", "substyle"=>1  );

$layout->skins["left"] = "menu";

$layout->blocks["left"][] = "left";
$layout->blocks["top"] = array();
$layout->containers["master"] = array();
$layout->container_properties["master"] = array(  );
$layout->containers["master"][] = array("name"=>"masterinfo", 
	"block"=>"mastertable_block", "substyle"=>1  );

$layout->skins["master"] = "empty";

$layout->blocks["top"][] = "master";
$layout->containers["toplinks"] = array();
$layout->container_properties["toplinks"] = array(  );
$layout->containers["toplinks"][] = array("name"=>"loggedas", 
	"block"=>"security_block", "substyle"=>1  );

$layout->skins["toplinks"] = "empty";

$layout->blocks["top"][] = "toplinks";
$layout->containers["hmenu"] = array();
$layout->container_properties["hmenu"] = array(  );
$layout->containers["hmenu"][] = array("name"=>"hmenu", 
	"block"=>"menu_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_buttons", 
	"block"=>"searchformbuttons_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_saving_buttons", 
	"block"=>"searchsaving_block", "substyle"=>1  );

$layout->skins["hmenu"] = "undermenu";

$layout->blocks["top"][] = "hmenu";
$page_layouts["leave_without_pay_list"] = $layout;

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


	
		
						


$layout = new TLayout("centered_hor1", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["center"] = array();
$layout->containers["recordcontrols"] = array();
$layout->container_properties["recordcontrols"] = array(  );
$layout->containers["recordcontrols"][] = array("name"=>"recordcontrols_new", 
	"block"=>"newrecord_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"recordcontrol", 
	"block"=>"record_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"toplinks", 
	"block"=>"more_list", "substyle"=>1  );

$layout->skins["recordcontrols"] = "2";

$layout->blocks["center"][] = "recordcontrols";
$layout->containers["message"] = array();
$layout->container_properties["message"] = array(  );
$layout->containers["message"][] = array("name"=>"message", 
	"block"=>"message_block", "substyle"=>1  );

$layout->skins["message"] = "2";

$layout->blocks["center"][] = "message";
$layout->containers["pagination"] = array();
$layout->container_properties["pagination"] = array(  );
$layout->containers["pagination"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination"] = "2";

$layout->blocks["center"][] = "pagination";
$layout->containers["grid"] = array();
$layout->container_properties["grid"] = array(  );
$layout->containers["grid"][] = array("name"=>"grid", 
	"block"=>"grid_block", "substyle"=>1  );

$layout->skins["grid"] = "grid";

$layout->blocks["center"][] = "grid";
$layout->containers["pagination_bottom"] = array();
$layout->container_properties["pagination_bottom"] = array(  );
$layout->containers["pagination_bottom"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination_bottom"] = "2";

$layout->blocks["center"][] = "pagination_bottom";
$layout->blocks["left"] = array();
$layout->containers["left"] = array();
$layout->container_properties["left"] = array(  );
$layout->containers["left"][] = array("name"=>"searchpanel", 
	"block"=>"searchPanel", "substyle"=>1  );

$layout->skins["left"] = "menu";

$layout->blocks["left"][] = "left";
$layout->blocks["top"] = array();
$layout->containers["master"] = array();
$layout->container_properties["master"] = array(  );
$layout->containers["master"][] = array("name"=>"masterinfo", 
	"block"=>"mastertable_block", "substyle"=>1  );

$layout->skins["master"] = "empty";

$layout->blocks["top"][] = "master";
$layout->containers["toplinks"] = array();
$layout->container_properties["toplinks"] = array(  );
$layout->containers["toplinks"][] = array("name"=>"loggedas", 
	"block"=>"security_block", "substyle"=>1  );

$layout->skins["toplinks"] = "empty";

$layout->blocks["top"][] = "toplinks";
$layout->containers["hmenu"] = array();
$layout->container_properties["hmenu"] = array(  );
$layout->containers["hmenu"][] = array("name"=>"hmenu", 
	"block"=>"menu_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_buttons", 
	"block"=>"searchformbuttons_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_saving_buttons", 
	"block"=>"searchsaving_block", "substyle"=>1  );

$layout->skins["hmenu"] = "undermenu";

$layout->blocks["top"][] = "hmenu";
$page_layouts["vacation_list"] = $layout;

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


	
						


$layout = new TLayout("centered_hor1", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["center"] = array();
$layout->containers["recordcontrols"] = array();
$layout->container_properties["recordcontrols"] = array(  );
$layout->containers["recordcontrols"][] = array("name"=>"recordcontrols_new", 
	"block"=>"newrecord_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"recordcontrol", 
	"block"=>"record_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"toplinks", 
	"block"=>"more_list", "substyle"=>1  );

$layout->skins["recordcontrols"] = "2";

$layout->blocks["center"][] = "recordcontrols";
$layout->containers["message"] = array();
$layout->container_properties["message"] = array(  );
$layout->containers["message"][] = array("name"=>"message", 
	"block"=>"message_block", "substyle"=>1  );

$layout->skins["message"] = "2";

$layout->blocks["center"][] = "message";
$layout->containers["pagination"] = array();
$layout->container_properties["pagination"] = array(  );
$layout->containers["pagination"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination"] = "2";

$layout->blocks["center"][] = "pagination";
$layout->containers["grid"] = array();
$layout->container_properties["grid"] = array(  );
$layout->containers["grid"][] = array("name"=>"grid", 
	"block"=>"grid_block", "substyle"=>1  );

$layout->skins["grid"] = "grid";

$layout->blocks["center"][] = "grid";
$layout->containers["pagination_bottom"] = array();
$layout->container_properties["pagination_bottom"] = array(  );
$layout->containers["pagination_bottom"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination_bottom"] = "2";

$layout->blocks["center"][] = "pagination_bottom";
$layout->blocks["left"] = array();
$layout->containers["left"] = array();
$layout->container_properties["left"] = array(  );
$layout->containers["left"][] = array("name"=>"searchpanel", 
	"block"=>"searchPanel", "substyle"=>1  );

$layout->skins["left"] = "menu";

$layout->blocks["left"][] = "left";
$layout->blocks["top"] = array();
$layout->containers["master"] = array();
$layout->container_properties["master"] = array(  );
$layout->containers["master"][] = array("name"=>"masterinfo", 
	"block"=>"mastertable_block", "substyle"=>1  );

$layout->skins["master"] = "empty";

$layout->blocks["top"][] = "master";
$layout->containers["toplinks"] = array();
$layout->container_properties["toplinks"] = array(  );
$layout->containers["toplinks"][] = array("name"=>"loggedas", 
	"block"=>"security_block", "substyle"=>1  );

$layout->skins["toplinks"] = "empty";

$layout->blocks["top"][] = "toplinks";
$layout->containers["hmenu"] = array();
$layout->container_properties["hmenu"] = array(  );
$layout->containers["hmenu"][] = array("name"=>"hmenu", 
	"block"=>"menu_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_buttons", 
	"block"=>"searchformbuttons_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_saving_buttons", 
	"block"=>"searchsaving_block", "substyle"=>1  );

$layout->skins["hmenu"] = "undermenu";

$layout->blocks["top"][] = "hmenu";
$page_layouts["doctors_list"] = $layout;

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


	
						


$layout = new TLayout("centered_hor1", "Office1Avenue2", "MobileAvenue2");
$layout->version = 2;
$layout->blocks["center"] = array();
$layout->containers["recordcontrols"] = array();
$layout->container_properties["recordcontrols"] = array(  );
$layout->containers["recordcontrols"][] = array("name"=>"recordcontrols_new", 
	"block"=>"newrecord_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"recordcontrol", 
	"block"=>"record_controls_block", "substyle"=>1  );

$layout->containers["recordcontrols"][] = array("name"=>"toplinks", 
	"block"=>"more_list", "substyle"=>1  );

$layout->skins["recordcontrols"] = "2";

$layout->blocks["center"][] = "recordcontrols";
$layout->containers["message"] = array();
$layout->container_properties["message"] = array(  );
$layout->containers["message"][] = array("name"=>"message", 
	"block"=>"message_block", "substyle"=>1  );

$layout->skins["message"] = "2";

$layout->blocks["center"][] = "message";
$layout->containers["pagination"] = array();
$layout->container_properties["pagination"] = array(  );
$layout->containers["pagination"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination"] = "2";

$layout->blocks["center"][] = "pagination";
$layout->containers["grid"] = array();
$layout->container_properties["grid"] = array(  );
$layout->containers["grid"][] = array("name"=>"grid", 
	"block"=>"grid_block", "substyle"=>1  );

$layout->skins["grid"] = "grid";

$layout->blocks["center"][] = "grid";
$layout->containers["pagination_bottom"] = array();
$layout->container_properties["pagination_bottom"] = array(  );
$layout->containers["pagination_bottom"][] = array("name"=>"details_found", 
	"block"=>"details_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"pagination", 
	"block"=>"pagination_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"page_of", 
	"block"=>"pages_block", "substyle"=>1  );

$layout->containers["pagination_bottom"][] = array("name"=>"recsperpage", 
	"block"=>"recordspp_block", "substyle"=>1  );

$layout->skins["pagination_bottom"] = "2";

$layout->blocks["center"][] = "pagination_bottom";
$layout->blocks["left"] = array();
$layout->containers["left"] = array();
$layout->container_properties["left"] = array(  );
$layout->containers["left"][] = array("name"=>"searchpanel", 
	"block"=>"searchPanel", "substyle"=>1  );

$layout->skins["left"] = "menu";

$layout->blocks["left"][] = "left";
$layout->blocks["top"] = array();
$layout->containers["master"] = array();
$layout->container_properties["master"] = array(  );
$layout->containers["master"][] = array("name"=>"masterinfo", 
	"block"=>"mastertable_block", "substyle"=>1  );

$layout->skins["master"] = "empty";

$layout->blocks["top"][] = "master";
$layout->containers["toplinks"] = array();
$layout->container_properties["toplinks"] = array(  );
$layout->containers["toplinks"][] = array("name"=>"loggedas", 
	"block"=>"security_block", "substyle"=>1  );

$layout->skins["toplinks"] = "empty";

$layout->blocks["top"][] = "toplinks";
$layout->containers["hmenu"] = array();
$layout->container_properties["hmenu"] = array(  );
$layout->containers["hmenu"][] = array("name"=>"hmenu", 
	"block"=>"menu_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_buttons", 
	"block"=>"searchformbuttons_block", "substyle"=>1  );

$layout->containers["hmenu"][] = array("name"=>"search_saving_buttons", 
	"block"=>"searchsaving_block", "substyle"=>1  );

$layout->skins["hmenu"] = "undermenu";

$layout->blocks["top"][] = "hmenu";
$page_layouts["traninig_connect_list"] = $layout;

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


	
		
	
// parse control parameters
$pageMode = EditPage::readEditModeFromRequest();

$xt = new Xtempl();	
	
$id = postvalue("id");
$id = intval($id) == 0 ? 1 : $id;


// $keys could not be set properly if editid params were no passed
$keys = array();
$keys["Id"] = postvalue("editid1");

//array of params for classes
$params = array();
$params["id"] = $id;
$params["xt"] = &$xt;
$params["keys"] = $keys;
$params["mode"] = $pageMode;
$params["pageType"] = PAGE_EDIT;
$params["tName"] = $strTableName;
$params["action"] = postvalue("a");

//	locking parameters
$params["lockingAction"] = postvalue("action");
$params["lockingSid"] = postvalue("sid");
$params["lockingKeys"] = postvalue("keys");
$params["lockingStart"] = postvalue("startEdit");

if( $pageMode == EDIT_INLINE )
{
	$params["screenWidth"] = postvalue("screenWidth");
	$params["screenHeight"] = postvalue("screenHeight");
	$params["orientation"] = postvalue("orientation");
}	

if( $pageMode == EDIT_DASHBOARD ) 
{
	$params["dashElementName"] = postvalue("dashelement");
	$params["dashTName"] = postvalue("table");
}

$pageObject = new EditPage($params);
$pageObject->init();

if( $pageObject->isLockingRequest() )
{
	$pageObject->doLockingAction();
	exit();
}

$pageObject->process();

?>