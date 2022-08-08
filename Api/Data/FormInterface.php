<?php
declare(strict_types=1);

namespace Dev\Grid\Api\Data;

interface FormInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const ID = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const AGE = 'age';
    const TYPE = 'type';
    const LANGUAGE = 'language';
    const DESIGNER = 'designer';

    /**
     * Get id
    * @return string|null
    */
    public function getId();

    /**
    * Set id
    * @param string $id
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setId($id);

    /**
     * Get first_name
     * @return string|null
     */
    public function getFirstName();

    /**
    * Set first_name
    * @param string $firstName
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setFirstName($firstName);

    /**
    * Get last_name
    * @return string|null
    */
    public function getLastName();

    /**
    * Set last_name
    * @param string $lastName
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setLastName($lastName);

    /**
     * Get age
     * @return int|null
     */
    public function getAge();

    /**
    * Set age
    * @param int $age
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setAge($age);

    /**
     * Get type
     * @return string|null
     */
    public function getType();

    /**
    * Set type
    * @param string $type
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setType($type);

    /**
    * Get language
    * @return string|null
    */
    public function getLanguage();

    /**
    * Set language
    * @param string $language
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setLanguage($language);

    /**
    * Get designer
    * @return string|null
    */
    public function getDesigner();

    /**
    * Set designer
    * @param string $designer
    * @return \Dev\Grid\Api\Data\FormInterface
    */
    public function setDesigner($designer);
}