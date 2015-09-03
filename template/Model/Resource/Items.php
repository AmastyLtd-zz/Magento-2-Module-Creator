<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */

namespace {{CompanyName}}\{{ModuleName}}\Model\Resource;

class Items extends \Magento\Framework\Model\Resource\Db\AbstractDb
{
    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('{{companyName}}_{{moduleName}}_items', 'id');
    }
}
