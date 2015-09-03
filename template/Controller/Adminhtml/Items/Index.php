<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */

namespace {{CompanyName}}\{{ModuleName}}\Controller\Adminhtml\Items;

class Index extends \{{CompanyName}}\{{ModuleName}}\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('{{CompanyName}}_{{ModuleName}}::{{moduleName}}');
        $resultPage->getConfig()->getTitle()->prepend(__('{{CompanyName}} Items'));
        $resultPage->addBreadcrumb(__('{{CompanyName}}'), __('{{CompanyName}}'));
        $resultPage->addBreadcrumb(__('Items'), __('Items'));
        return $resultPage;
    }
}
