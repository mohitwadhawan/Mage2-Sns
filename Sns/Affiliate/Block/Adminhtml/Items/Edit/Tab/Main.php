<?php
namespace Sns\Affiliate\Block\Adminhtml\Items\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{

    public function getTabLabel()
    {
        return __('Customer Information');
    }

    public function getTabTitle()
    {
        return __('Customer Information');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_sns_affiliate_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'enctype'=>'multipart/form-data','action' => $this->getData('action'), 'method' => 'post']]
        );
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Customer Information')]);
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Customer Name'), 'title' => __('Customer Name'), 'required' => true]
        );

        $fieldset->addField('status', 'select', array(
            'name'      => 'status',
            'label'     => 'Status',
            'title'     => 'Status',
            'required'  => false,
            'options' => ['Enable' => __('Enable'), 'Disabled' => __('Disabled')]
        )); 

        $fieldset->addField('preview_image', 'image', array(
            'name'      => 'preview_image',
            'label'     => 'Picture',
            'title'     => 'Picture',
            'required'  => false
        )); 
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
