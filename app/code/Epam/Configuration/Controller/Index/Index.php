<?php

namespace Epam\Configuration\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Epam\Configuration\Model\Store\Config;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    /**
     * @var Config
    */
    private $config;

    public function __construct(Context $context, Config $config)
    {
        parent::__construct($context);
        $this->config = $config;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        /**
         * @var \Magento\Framework\View\Result\Page $result
        */
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $layout = $result->getLayout();
        $block = $layout->getBlock('myblock');
        $block->setText($this->config->getSnippetText());
        return $result;
    }
}