<?php
declare(strict_types=1);

namespace Module\AdminGrid\Api\Data;

interface CustomRuleInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const STATUS = 'status';
    const CUSTOMRULE_ID = 'customrule_id';
    const RULE_CODE = 'rule_code';
    const ENTITY_ID = 'entity_id';
    const FROM_DATE = 'from_date';
    const TO_DATE = 'to_date';

    /**
     * Get customrule_id
     * @return string|null
     */
    public function getCustomruleId();

    /**
     * Set customrule_id
     * @param string $customruleId
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setCustomruleId($customruleId);

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId();

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setEntityId($entityId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Module\AdminGrid\Api\Data\CustomRuleExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Module\AdminGrid\Api\Data\CustomRuleExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Module\AdminGrid\Api\Data\CustomRuleExtensionInterface $extensionAttributes
    );

    /**
     * Get rule_code
     * @return string|null
     */
    public function getRuleCode();

    /**
     * Set rule_code
     * @param string $ruleCode
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setRuleCode($ruleCode);

    /**
     * Get from_date
     * @return string|null
     */
    public function getFromDate();

    /**
     * Set from_date
     * @param string $fromDate
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setFromDate($fromDate);

    /**
     * Get to_date
     * @return string|null
     */
    public function getToDate();

    /**
     * Set to_date
     * @param string $toDate
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setToDate($toDate);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setStatus($status);
}
