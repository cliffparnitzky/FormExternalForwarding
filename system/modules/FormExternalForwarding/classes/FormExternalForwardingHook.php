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
 * Class FormExternalForwardingHook to implement special hooks
 *
 * @copyright  Cliff Parnitzky 2014
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class FormExternalForwardingHook extends \System
{
	/**
	 * Implementation of process form data HOOK
	 */
	public function processFormData($arrData, $arrFormData, $arrFiles, $arrLabels, $objForm)
	{
		if (strlen($arrFormData['external_forwarding_url']) > 0)
		{
			// unset values from contao form framework
			unset($arrData['REQUEST_TOKEN']);
			unset($arrData['FORM_SUBMIT']);
			
			$parameterArrays = array();
			if ($arrFormData['external_forwarding_remove_empty_parameters'])
			{
				$arrData = array_filter($arrData);
			}
			foreach($arrData as $key=>$value)
			{
				if (is_array($value))
				{
					// remove empty fields, if set in form
					if ($arrFormData['external_forwarding_remove_empty_parameters'])
					{
						$value = array_filter($value);
					}
					
					// collect and encode array parameters
					$arrValues = array();
					foreach ($value as $v)
					{
						$arrValues[] = urlencode($v);
					}
					if (count($arrValues) > 0)
					{
						$parameterArrays[] = $key. '[]=' . implode("&" . $key. '[]=', $arrValues);
					}
					unset($arrData[$key]);
					unset($arrData[$key. '[]']);
				}
			}
			// prepare url
			$forwardingUrl = $arrFormData['external_forwarding_url'];
			if (strpos($forwardingUrl, '?') === false)
			{
				$forwardingUrl .= '?';
			}
			else
			{
				$forwardingUrl .= '&';
			}
			if (count($arrData) > 0)
			{
				$forwardingUrl .= http_build_query($arrData);
			}
			if (count($parameterArrays) > 0)
			{
				if (count($arrData) > 0)
				{
					$forwardingUrl .= '&';
				}
				$forwardingUrl .= implode('&', $parameterArrays);
			}
			//echo "<br><br><br>";
			//echo "to: " . $forwardingUrl;
			//echo "<br><br><br>";
			//echo "to: <a href='" . $forwardingUrl . "'>" . $forwardingUrl . "</a>";
			\Controller::redirect($forwardingUrl);
		}
	}
	
	/**
	 * Implementation of compile form fields HOOK
	 */
	public function compileFormFields($arrFields, $formId, $objForm)
	{
		if (strlen($objForm->external_forwarding_url) > 0 && $objForm->external_forwarding_open_in_new_window)
		{
			$arrAttributes = deserialize($objForm->__get('attributes'));
			$arrAttributes[1] = $arrAttributes[1] . '" target="_blank';
			$objForm->__set('attributes', serialize($arrAttributes));
		}
		return $arrFields;
	}
}

?>