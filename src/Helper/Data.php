<?php declare(strict_types=1);
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace RichardParnabyKing\PixieMediaTest\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $scopeConfig;
    
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        ScopeConfigInterface $scopeConfig
    ) {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }
    
    
    /**
     * Is this module enabled? 
     * @return boolean
     */
    public function isActive() {
        return $this->scopeConfig->getValue(
            'richardparnabyking_pixiemediatest/chuck_norris/enabled',
            ScopeInterface::SCOPE_STORE,
            null
        );
    }
}
