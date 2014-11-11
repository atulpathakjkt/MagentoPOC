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
class User_Surveys_Block_Adminhtml_Surveys_Link_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare form action
     *
     * @return User_Surveys_Block_Adminhtml_News_Edit_Form
     */
    protected function _prepareForm()
    {
       $model= Mage::registry('codeModel');
       
       $form = new Varien_Data_Form(array(
       		'id'      => 'edit_form',
       		'action'  => $this->getUrl('*/*/save'),
       		'method'  => 'post',
       		'enctype' => 'multipart/form-data'
       ));
       
       $form->setUseContainer(true);
       $data = $model->getData();
       
        foreach ( $data as $key=>$value ) {
        	$featuredId = $value ['id'];
        }
        $baseUrl = Mage::getBaseUrl();
        $url =  $baseUrl.'surveys/index/view/id/' .$featuredId ;
        
        $fieldset = $form->addFieldset(
        		'general',
        		array(
        				'legend' => $this->__('Featured Form :   ' .$url)
        		)
        );
        
        $fieldset->addField('status', 'select', array(
            'name'     => 'status',
            'label'    => Mage::helper('user_surveys')->__('Get Link'),
            'values'   => Mage::getSingleton('user_surveys/surveys')->getOptionArray(),
        ));
        
        $fieldset->addField('link', 'textarea', array(
        		'name'     => 'form_name',
        		'label'    => Mage::helper('user_surveys')->__('<a href="'.$url. '">Featured Survey</a>'),
        		'title'    => Mage::helper('user_surveys')->__('Form Name'),
        		'style'    => 'display:none;',
        		'after_element_html' => '<medium>Comments</medium>',
        		'required' => false,
        
        ));
        
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

