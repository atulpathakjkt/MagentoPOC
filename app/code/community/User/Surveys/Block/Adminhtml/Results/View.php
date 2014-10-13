<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    User
 * @package     User_Surveys
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class User_Surveys_Block_Adminhtml_Results_View  extends Mage_Adminhtml_Block_Widget_Form_Container
{
	
	protected function _prepareLayout(){
	
		parent::_prepareLayout();
	
	}
	
    /**
     * Initialize edit form container
     *
     */
	public function __construct()
	{die('adas');
		$this->_objectId   = 'id';
		$this->_blockGroup = 'user_surveys';
		$this->_controller = 'adminhtml_results';
	
		parent::__construct();
	
		$this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('page_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'page_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'page_content');
                }
            }
	
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
	}
	
	
	
	/**
	 * Retrieve text for header element depending on loaded page
	 *
	 * @return string
	 */
	public function getHeaderText()
	{
		$model = Mage::helper('user_surveys')->getSurveysItemInstance();
		if ($model->getId()) {
			return Mage::helper('user_surveys')->__("View Result Items",
					$this->escapeHtml($model->getTitle()));
		} else {
			return Mage::helper('user_surveys')->__('View Form');
		}
	}


}