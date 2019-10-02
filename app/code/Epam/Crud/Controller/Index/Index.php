<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Model\ResourceModel\Entity\CollectionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(Context $context, CollectionFactory $collectionFactory)
    {
        parent::__construct($context);

        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('entity_id', ['eq' => 3]);

        $this->getResponse()->appendBody(json_encode($collection->getData()[0]));
    }
}
