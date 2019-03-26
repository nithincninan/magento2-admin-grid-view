<?php
/**
 * Module AdminGrid Model
 * @package Module/AdminGrid
 */
declare(strict_types=1);

namespace Module\AdminGrid\Model;

use Magento\Framework\Api\DataObjectHelper;
use Module\AdminGrid\Api\Data\CustomRuleInterface;
use Module\AdminGrid\Api\Data\CustomRuleInterfaceFactory;

class CustomRule extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'admingrid_customrule';
    protected $dataObjectHelper;

    protected $customruleDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CustomRuleInterfaceFactory $customruleDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Module\AdminGrid\Model\ResourceModel\CustomRule $resource
     * @param \Module\AdminGrid\Model\ResourceModel\CustomRule\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CustomRuleInterfaceFactory $customruleDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Module\AdminGrid\Model\ResourceModel\CustomRule $resource,
        \Module\AdminGrid\Model\ResourceModel\CustomRule\Collection $resourceCollection,
        array $data = []
    ) {
        $this->customruleDataFactory = $customruleDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve customrule model with customrule data
     * @return CustomRuleInterface
     */
    public function getDataModel()
    {
        $customruleData = $this->getData();
        
        $customruleDataObject = $this->customruleDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $customruleDataObject,
            $customruleData,
            CustomRuleInterface::class
        );
        
        return $customruleDataObject;
    }
}
