<?php
/**
 * Copyright © 2015 {{CompanyName}}. All rights reserved.
 */

namespace {{CompanyName}}\{{ModuleName}}\Controller\Adminhtml\Items;

class Delete extends \{{CompanyName}}\{{ModuleName}}\Controller\Adminhtml\Items
{

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $model = $this->_objectManager->create('{{CompanyName}}\{{ModuleName}}\Model\Items');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('You deleted the item.'));
                $this->_redirect('{{companyName}}_{{moduleName}}/*/');
                return;
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError(
                    __('We can\'t delete item right now. Please review the log and try again.')
                );
                $this->_objectManager->get('Psr\Log\LoggerInterface')->critical($e);
                $this->_redirect('{{companyName}}_{{moduleName}}/*/edit', ['id' => $this->getRequest()->getParam('id')]);
                return;
            }
        }
        $this->messageManager->addError(__('We can\'t find a item to delete.'));
        $this->_redirect('{{companyName}}_{{moduleName}}/*/');
    }
}
