<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */

namespace {{CompanyName}}\{{ModuleName}}\Model;

class Items extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('{{CompanyName}}\{{ModuleName}}\Model\ResourceModel\Items');
    }
}
