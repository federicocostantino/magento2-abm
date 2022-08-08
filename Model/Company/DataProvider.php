<?php

namespace Dev\Grid\Model\Company;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Dev\Grid\Model\ResourceModel\Company\Grid\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends AbstractDataProvider
{
    protected $loadedData;
    protected $collection;
    protected $dataPersistor;

    /**
    * Store manager
    *
    * @var \Magento\Store\Model\StoreManagerInterface
    */
    protected $storeManager;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $model) {
            $itemData = $model->getData();
            $this->loadedData[$model->getId()] = $itemData;
        }

        $data = $this->dataPersistor->get('dev_grid_company');

        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('dev_grid_company');
        }
        
        return $this->loadedData;
    }
}