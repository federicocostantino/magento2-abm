<?php
declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Company;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;

class NewAction extends Action
{
    protected $resultForwardFactory;
    
    /**
    * @param Context $context
    * @param ForwardFactory $resultForwardFactory
    */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    ) 
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
    
    /**
    * New action
    *
    * @return \Magento\Framework\Controller\ResultInterface
    */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Forward $resultForward */
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}