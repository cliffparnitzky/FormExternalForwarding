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
	 * Set mail recipient
	 * @return array
	 */
	//$arrSubmitted, $arrFiles, $intOldId, &$arrFor, $arrLabels
	public function processFormData($arrData, $arrForm){
		if (strlen($arrForm['external_forwarding_url']) > 0)
		{
			// unset values from contao form framework
			unset($arrData['REQUEST_TOKEN']);
			unset($arrData['FORM_SUBMIT']);
			
			$parameterArrays = array();
			foreach($arrData as $key=>$value)
			{
				// remove empty fields, if set in form
				if ($arrForm['external_forwarding_remove_empty_parameters'] && ((is_array($value) && count($value) == 0) || (!is_array($value) && strlen($value) == 0)))
				{
					unset($arrData[$key]);
					unset($arrData[$key. '[]']);
				}
				else
				{
					if (is_array($value))
					{
						// remove empty fields, if set in form
						if ($arrForm['external_forwarding_remove_empty_parameters'])
						{
							$value = array_filter($value);
						}
						// collect and encode array parameters
						$arrValues = array();
						foreach ($value as $v)
						{
							$arrValues[] = urlencode($v);
						}
						$parameterArrays[] = $key. '[]=' . implode("&" . $key. '[]=', $arrValues);
						unset($arrData[$key]);
						unset($arrData[$key. '[]']);
					}
				}
			}
			// prepare url
			$forwardingUrl = $arrForm['external_forwarding_url'];
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
}

?>