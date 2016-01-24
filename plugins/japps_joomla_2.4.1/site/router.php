<?php
defined('_JEXEC') or die;
/**
* @link joobi.co
* @copyright Copyright (C) 2007-2015 Joobi Limited All rights reserved.
* This file is released under the GPL v3
*/
function JappsBuildRoute(&$query){
if (!class_exists("WPage")){
$status=include(JPATH_ROOT.DIRECTORY_SEPARATOR."joobi".DIRECTORY_SEPARATOR."entry.php");
if (!$status) return;
}
return WPage::buildURL($query);
}
function JappsParseRoute($segments){
if (!class_exists("WPage")){
$status=include(JPATH_ROOT.DIRECTORY_SEPARATOR."joobi".DIRECTORY_SEPARATOR."entry.php");
if (!$status) return;
}
return WPage::interpretURL($segments);
}
