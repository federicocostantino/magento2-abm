<?php
declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Company;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\App\Action;
use Dev\Grid\Model\ResourceModel\Company\Grid\CollectionFactory;

class MassDelete extends Action
{
    /**
    * @var Filter
    */
    protected $filter;

    /**
    * @var CollectionFactory
    */
    protected $collectionFactory;

    /**
    * @param Context $context
    * @param Filter $filter
    * @param CollectionFactory $collectionFactory
    */
    public function __construct(
        Context $context, 
        Filter $filter, 
        CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
    * Execute action
    *
    * @return \Magento\Backend\Model\View\Result\Redirect
    * @throws \Magento\Framework\Exception\LocalizedException|\Exception
    */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        
        $collectionSize = $collection->getSize();

        $recordDeleted=0;
        foreach ($collection as $item) {
            $deleteItem = $this->_objectManager->get('Dev\Grid\Model\Company')->load($item->getId());
            $deleteItem->delete();
            $recordDeleted++;
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('*/*/');
    }
}
