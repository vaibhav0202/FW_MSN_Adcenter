<?php
/**
 * @category    FW
 * @package     FW_MSN_Adcenter
 * @copyright   Copyright (c) 2011 F+W Media, Inc. (http://www.fwmedia.com)
 */
class FW_MSN_Adcenter_Helper_Data extends Mage_Core_Helper_Abstract 
{
	/**
     * Config path for using throughout the code
	 * @var string $XML_PATH
     */
    const XML_PATH = 'thirdparty/msnadcenter/';
	
	/**
	 * Whether MSN Adcenter is enabled
	 * @param mixed $store
	 * @return bool
	 */
	public function isMSNAdcenterEnabled($store = null)
	{
		return Mage::getStoreConfig('thirdparty/msnadcenter/active', $store);
	}

	/**
	 * Get the MSN Adcenter Domain ID
	 * @param mixed $store
	 * @return string
	 */
	public function getDomainID($store = null)
	{
		return Mage::getStoreConfig('thirdparty/msnadcenter/did', $store);
	}
	
	/**
	* Get the MSN Adcenter CP Value
	* @param mixed $store
	* @return string
	*/
	public function getCPValueID($store = null)
	{
		return Mage::getStoreConfig('thirdparty/msnadcenter/cp', $store);
	}

	/**
	 * Whether MSN Adcenter is ready to use
	 * @param mixed $store
	 * @return bool
	 */
	public function isMSNAdcenterAvailable($store = null)
	{
		$enabled = $this->isMSNAdcenterEnabled($store);
		$domainid = $this->getDomainID($store);
		
		if($enabled == 1 && $domainid != NULL){
			return true;
		}else{
			return false;
		}	
	}
}
