<?php

namespace Dev\Grid\Controller\Adminhtml\Company;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action implements \Magento\Framework\App\Action\HttpPostActionInterface
{
    protected $dataPersistor;

    /**
    * @param \Magento\Backend\App\Action\Context $context
    * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
    * Save action
    *
    * @return \Magento\Framework\Controller\ResultInterface
    */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            $model = $this->_objectManager->create(\Dev\Grid\Model\Company::class)->load($id);
            
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Form no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            
            $model->setData($data);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Employee.'));
                $this->dataPersistor->clear('dev_grid_company');

                if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Form.'));
            }

            $this->dataPersistor->set('dev_grid_company', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}