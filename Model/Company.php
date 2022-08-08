<?php
declare(strict_types=1);

namespace Dev\Grid\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Company extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'company';
    protected $_cacheTag = 'company';
    protected $_eventPrefix = 'company';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Dev\Grid\Model\ResourceModel\Company::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}