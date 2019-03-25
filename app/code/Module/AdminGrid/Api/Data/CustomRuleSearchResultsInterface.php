<?php


namespace Module\AdminGrid\Api\Data;

interface CustomRuleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CustomRule list.
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface[]
     */
    public function getItems();

    /**
     * Set entity_id list.
     * @param \Module\AdminGrid\Api\Data\CustomRuleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
