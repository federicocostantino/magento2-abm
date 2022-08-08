<?php

namespace Dev\Grid\Ui\DataProvider\Company\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect()
    {
        // TO-DO: ACÁ SE MODIFICA LAS COLUMNAS DEL GRID
        $this->addFilterToMap('id', 'main_table.id');
        $this->addFilterToMap('first_name', 'devgridname.value');
        parent::_initSelect();
    }
}
