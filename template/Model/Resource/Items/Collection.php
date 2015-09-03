<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */

namespace {{CompanyName}}\{{ModuleName}}\Model\Resource\Items;

class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('{{CompanyName}}\{{ModuleName}}\Model\Items', '{{CompanyName}}\{{ModuleName}}\Model\Resource\Items');
    }
}
