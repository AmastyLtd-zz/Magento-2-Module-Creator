<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */

namespace {{CompanyName}}\{{ModuleName}}\Controller\Adminhtml\Items;

class NewAction extends \{{CompanyName}}\{{ModuleName}}\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
