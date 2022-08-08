<?php

namespace Dev\Grid\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Module\Setup\Migration;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Dev\Grid\Model\Company;

/**
 * Class AddData
*/
class AddData implements DataPatchInterface, PatchVersionInterface
{

    /** @var Company */
    private $company;

    /** 
     * @param Company $company 
    */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
        * {@inheritdoc}
        * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function apply()
    {
        $companyData = [];

        $companyData['first_name'] = "Federico";
        $companyData['last_name'] = "Costantino";
        $companyData['age'] = 32;
        $companyData['type'] = "Programeer";
        $companyData['language'] = "PHP";
        $companyData['designer'] = NULL;

        $this->company->addData($companyData);
        $this->company->getResource()->save($this->company);
    }

    /**
    * {@inheritdoc}
    */
    public static function getDependencies()
    {
        return [];
    }

    /**
    * {@inheritdoc}
    */
    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
    * {@inheritdoc}
    */
    public function getAliases()
    {
        return [];
    }
}  