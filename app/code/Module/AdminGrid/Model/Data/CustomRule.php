<?php


namespace Module\AdminGrid\Model\Data;

use Module\AdminGrid\Api\Data\CustomRuleInterface;

class CustomRule extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomRuleInterface
{

    /**
     * Get customrule_id
     * @return string|null
     */
    public function getCustomruleId()
    {
        return $this->_get(self::CUSTOMRULE_ID);
    }

    /**
     * Set customrule_id
     * @param string $customruleId
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setCustomruleId($customruleId)
    {
        return $this->setData(self::CUSTOMRULE_ID, $customruleId);
    }

    /**
     * Get entity_id
     * @return string|null
     */
    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     * @param string $entityId
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Module\AdminGrid\Api\Data\CustomRuleExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Module\AdminGrid\Api\Data\CustomRuleExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Module\AdminGrid\Api\Data\CustomRuleExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get rule_code
     * @return string|null
     */
    public function getRuleCode()
    {
        return $this->_get(self::RULE_CODE);
    }

    /**
     * Set rule_code
     * @param string $ruleCode
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setRuleCode($ruleCode)
    {
        return $this->setData(self::RULE_CODE, $ruleCode);
    }

    /**
     * Get from_date
     * @return string|null
     */
    public function getFromDate()
    {
        return $this->_get(self::FROM_DATE);
    }

    /**
     * Set from_date
     * @param string $fromDate
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setFromDate($fromDate)
    {
        return $this->setData(self::FROM_DATE, $fromDate);
    }

    /**
     * Get to_date
     * @return string|null
     */
    public function getToDate()
    {
        return $this->_get(self::TO_DATE);
    }

    /**
     * Set to_date
     * @param string $toDate
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setToDate($toDate)
    {
        return $this->setData(self::TO_DATE, $toDate);
    }

    /**
     * Get status
     * @return string|null
     */
    public function getStatus()
    {
        return $this->_get(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
