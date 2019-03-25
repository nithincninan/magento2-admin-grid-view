<?php
/**
 * Module AdminGrid Repository Interface
 * @package Module/AdminGrid
 */
declare(strict_types=1);

namespace Module\AdminGrid\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomRuleRepositoryInterface
{

    /**
     * Save CustomRule
     * @param \Module\AdminGrid\Api\Data\CustomRuleInterface $customRule
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Module\AdminGrid\Api\Data\CustomRuleInterface $customRule
    );

    /**
     * Retrieve CustomRule
     * @param string $customruleId
     * @return \Module\AdminGrid\Api\Data\CustomRuleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($customruleId);

    /**
     * Retrieve CustomRule matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Module\AdminGrid\Api\Data\CustomRuleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CustomRule
     * @param \Module\AdminGrid\Api\Data\CustomRuleInterface $customRule
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Module\AdminGrid\Api\Data\CustomRuleInterface $customRule
    );

    /**
     * Delete CustomRule by ID
     * @param string $customruleId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customruleId);
}
