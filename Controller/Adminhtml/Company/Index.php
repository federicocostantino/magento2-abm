<?php
declare(strict_types=1);

namespace Dev\Grid\Controller\Adminhtml\Company;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(Context $context, PageFactory $rawFactory) 
    {
        $this->pageFactory = $rawFactory;
        parent::__construct($context);
    }

    /**
     * Add the main Admin Grid page
     *
     * @return Page
     */
    public function execute(): Page
    {
        // die('aca estoy');
        
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Dev_Grid::top_level');
        $resultPage->getConfig()->getTitle()->prepend(__('Company Grid'));

        return $resultPage;
    }
}