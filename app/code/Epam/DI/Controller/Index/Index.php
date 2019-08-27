<?php
declare(strict_types=1);

namespace Epam\DI\Controller\Index;

use Epam\DI\Api\HtmlGenerator;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    /**
     * @var HtmlGenerator
     */
    private $htmlGenerator;

    public function __construct(Context $context, HtmlGenerator $htmlGenerator)
    {
        parent::__construct($context);
        $this->htmlGenerator = $htmlGenerator;
    }

    /**
     * @inheritdoc
     */
    public function execute()
    {
        /**
         * @var Raw $result
         */
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);

        $result->setContents($this->htmlGenerator->getHtml());

        return $result;
    }
}