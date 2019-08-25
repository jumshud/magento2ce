<?php
declare(strict_types=1);

namespace Epam\Configuration\Model\Store;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    /**
     * @var ScopeConfigInterface
    */
    protected $config;

    /**
     * @param  ScopeConfigInterface $config
     */
    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getSnippetText()
    {
        return $this->config->getValue('epam_config/epam_group/epam_text', ScopeInterface::SCOPE_STORE);
    }

}