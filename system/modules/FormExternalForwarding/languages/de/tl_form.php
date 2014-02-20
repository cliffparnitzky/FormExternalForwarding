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
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_url']                     = array("Weiterleitungs URL", "Geben Sie die URL einer externen Webseite an, auf die beim Absenden des Formulars weiterleitetet werden soll.<br/><br/>Als <b>" . $GLOBALS['TL_LANG']['tl_form']['method'][0] . "</b> muss <u>POST</u> gewählt sein.<br/><br/>Bei der Weiterleitung werden dann die Werte der Felder als GET-Parameter an die URL angefügt.");
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_remove_empty_parameters'] = array("Felder mit leeren Werten entfernen", "Wählen Sie, ob leere Felder an die Weiterleitungs URL angefügt werden sollen oder nicht.");
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_open_in_new_window']      = array("In neuem Fenster öffnen", "Wählen Sie ob das Formular beim Absenden in einem neuen Browserfenster geöffnet werden soll.");

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_form']['external_forwarding_legend'] = "Externe Weiterleitung";
 
?>