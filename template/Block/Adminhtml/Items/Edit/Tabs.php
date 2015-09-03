<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */
namespace {{CompanyName}}\{{ModuleName}}\Block\Adminhtml\Items\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('{{companyName}}_{{moduleName}}_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Item'));
    }
}
