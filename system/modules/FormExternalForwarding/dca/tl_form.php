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
 * Add to palette
 */
$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace('{email_legend}', '{external_forwarding_legend},external_forwarding_url,external_forwarding_remove_empty_parameters;{email_legend}', $GLOBALS['TL_DCA']['tl_form']['palettes']['default']);

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_form']['fields']['external_forwarding_url'] = array
( 
	'label'      => &$GLOBALS['TL_LANG']['tl_form']['external_forwarding_url'], 
	'exclude'    => true, 
	'inputType'  => 'text', 
	'eval'       => array('maxlength'=>255, 'rgxp'=>'url', 'decodeEntities'=>true, 'tl_class'=>'long'),
	'sql'        => "varchar(255) NOT NULL default ''" 
);
$GLOBALS['TL_DCA']['tl_form']['fields']['external_forwarding_remove_empty_parameters'] = array
( 
	'label'      => &$GLOBALS['TL_LANG']['tl_form']['external_forwarding_remove_empty_parameters'], 
	'exclude'    => true, 
	'inputType'  => 'checkbox', 
	'eval'       => array('tl_class'=>'w50'),
	'sql'        => "char(1) NOT NULL default ''" 
);

?>