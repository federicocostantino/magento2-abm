<?php

namespace Dev\Grid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

class Company extends AbstractDb
{
    public function __construct(Context $context)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('company', 'id');
	}
}