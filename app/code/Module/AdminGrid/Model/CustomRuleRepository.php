<?php


namespace Module\AdminGrid\Model;

use Module\AdminGrid\Model\ResourceModel\CustomRule as ResourceCustomRule;
use Magento\Framework\Reflection\DataObjectProcessor;
use Module\AdminGrid\Api\Data\CustomRuleInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Module\AdminGrid\Api\Data\CustomRuleSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Module\AdminGrid\Model\ResourceModel\CustomRule\CollectionFactory as CustomRuleCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Module\AdminGrid\Api\CustomRuleRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

class CustomRuleRepository implements CustomRuleRepositoryInterface
{

    protected $dataObjectHelper;

    protected $dataCustomRuleFactory;

    private $collectionProcessor;

    protected $dataObjectProcessor;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $customRuleCollectionFactory;

    protected $extensionAttributesJoinProcessor;

    protected $customRuleFactory;

    private $storeManager;


    /**
     * @param ResourceCustomRule $resource
     * @param CustomRuleFactory $customRuleFactory
     * @param CustomRuleInterfaceFactory $dataCustomRuleFactory
     * @param CustomRuleCollectionFactory $customRuleCollectionFactory
     * @param CustomRuleSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCustomRule $resource,
        CustomRuleFactory $customRuleFactory,
        CustomRuleInterfaceFactory $dataCustomRuleFactory,
        CustomRuleCollectionFactory $customRuleCollectionFactory,
        CustomRuleSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->customRuleFactory = $customRuleFactory;
        $this->customRuleCollectionFactory = $customRuleCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomRuleFactory = $dataCustomRuleFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Module\AdminGrid\Api\Data\CustomRuleInterface $customRule
    ) {
        /* if (empty($customRule->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customRule->setStoreId($storeId);
        } */
        
        $customRuleData = $this->extensibleDataObjectConverter->toNestedArray(
            $customRule,
            [],
            \Module\AdminGrid\Api\Data\CustomRuleInterface::class
        );
        
        $customRuleModel = $this->customRuleFactory->create()->setData($customRuleData);
        
        try {
            $this->resource->save($customRuleModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customRule: %1',
                $exception->getMessage()
            ));
        }
        return $customRuleModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($customRuleId)
    {
        $customRule = $this->customRuleFactory->create();
        $this->resource->load($customRule, $customRuleId);
        if (!$customRule->getId()) {
            throw new NoSuchEntityException(__('CustomRule with id "%1" does not exist.', $customRuleId));
        }
        return $customRule->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customRuleCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Module\AdminGrid\Api\Data\CustomRuleInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Module\AdminGrid\Api\Data\CustomRuleInterface $customRule
    ) {
        try {
            $customRuleModel = $this->customRuleFactory->create();
            $this->resource->load($customRuleModel, $customRule->getCustomruleId());
            $this->resource->delete($customRuleModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CustomRule: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($customRuleId)
    {
        return $this->delete($this->getById($customRuleId));
    }
}
