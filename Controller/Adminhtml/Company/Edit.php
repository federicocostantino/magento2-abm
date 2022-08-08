<?php
declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Company;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    protected $resultPageFactory;

    /**
    * @param \Magento\Backend\App\Action\Context $context
    * @param \Magento\Framework\Registry $coreRegistry
    * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
    */
    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory) 
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
    * Edit action
    *
    * @return \Magento\Framework\Controller\ResultInterface
    */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Dev\Grid\Model\Company::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Company no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->coreRegistry->register('dev_grid_index', $model);

        // 3. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Forms'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Employee #%1', $model->getId()) : __('New Employee Form'));
        return $resultPage;
    }
}