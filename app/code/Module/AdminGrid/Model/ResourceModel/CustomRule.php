<?php
/**
 * Module AdminGrid Resource Model
 * @package Module/AdminGrid
 */
declare(strict_types=1);

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
        $this->_init('admingrid_customrule', 'customrule_id');
    }
}
