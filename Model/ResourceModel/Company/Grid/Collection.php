<?php
declare(strict_types=1);

namespace Dev\Grid\Model\ResourceModel\Company\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Company Resource Model Collection
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_previewFlag;

    /**
     * Initialize resource collection.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->_init(
            'Dev\Grid\Model\Company', 
            'Dev\Grid\Model\ResourceModel\Company'
        );
        $this->_map['fields']['id'] = 'main_table.id';
    }
}