<?php
/**
 * @category    FW
 * @package     FW_MSN_Adcenter
 * @copyright   Copyright (c) 2011 F+W Media, Inc. (http://www.fwmedia.com)
 */
class FW_MSN_Adcenter_Block_Adcenter extends Mage_Core_Block_Text {
	
	/**
	 * Render the MSN Adcenter tracking scripts
	 * @return string
	 */
	protected function _toHtml() {
		$return = '';
		$helper = Mage::helper('fw_msn_adcenter');
		$storeid = Mage::app()->getStore()->getStoreId();
		if ($helper->isMSNAdcenterAvailable($storeid)) {
			$protocol = 'http'.(Mage::app()->getStore()->isCurrentlySecure() ? 's' : '');
			$return = sprintf('
<script>microsoft_adcenterconversion_domainid="%2$s";microsoft_adcenterconversion_cp="%3$s";</script>
<script src="%1$s://0.r.msn.com/scripts/microsoft_adcenterconversion.js"></script>
<noscript><img width="1" height="1" src="%1$s://%2$s.r.msn.com/?type=1&cp=1"/></noscript>',
				$this->jsQuoteEscape($protocol),				// HTTP Protocol
				$this->jsQuoteEscape($helper->getDomainID()),	// Domain ID from Config
				$this->jsQuoteEscape($helper->getCPValueID())	// CPValue ID from Config
			);
		}
		return $return;
	}
}