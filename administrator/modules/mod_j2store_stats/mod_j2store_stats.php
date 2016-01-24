<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

defined('_JEXEC') or die;
JFactory::getLanguage()->load('com_j2store', JPATH_SITE);
$moduleclass_sfx = $params->get('moduleclass_sfx','');
require( JModuleHelper::getLayoutPath('mod_j2store_stats') );
$currency = J2Store::currency();
?>