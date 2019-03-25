<?php


namespace Module\AdminGrid\Model\ResourceModel\CustomRule;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Module\AdminGrid\Model\CustomRule::class,
            \Module\AdminGrid\Model\ResourceModel\CustomRule::class
        );
    }
}
