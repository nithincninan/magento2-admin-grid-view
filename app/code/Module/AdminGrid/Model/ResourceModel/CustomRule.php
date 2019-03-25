<?php


namespace Module\AdminGrid\Model\ResourceModel;

class CustomRule extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('module_admingrid_customrule', 'customrule_id');
    }
}
