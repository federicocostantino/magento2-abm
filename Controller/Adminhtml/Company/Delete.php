<?php

namespace Dev\Grid\Controller\Adminhtml\Company;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;
use Dev\Grid\Model\ResourceModel\Company\Grid\CollectionFactory;

class Delete extends Action implements \Magento\Framework\App\Action\HttpPostActionInterface
{
    protected $resultPageFactory;
    protected $extensionFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CollectionFactory $collectionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParams();
            if ($data) {
                $deleteItem = $this->_objectManager->get('Dev\Grid\Model\Company')->load($data['id']);
                $deleteItem->delete();
                $this->messageManager->addSuccessMessage(__("Employee Delete Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete employee, Please try again."));
        }
        
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }
}