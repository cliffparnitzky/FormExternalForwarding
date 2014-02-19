<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    FormExternalForwarding
 * @license    LGPL
 */

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_url']                     = array("Forwarding URL", "Select an URL of an external website, where to forward after submitting the form.<br/><br/>The <b>" . $GLOBALS['TL_LANG']['tl_form']['method'][0] . "</b> has to be <u>POST</u>.<br/><br/>When forwarding the values of the fields will be appended as a GET parameter to the URL.");
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_remove_empty_parameters'] = array("Remove fields with empty values", "Select whether empty fields should be added to the forwarding URL or not.");

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_legend'] = "External forwarding";
 
?>