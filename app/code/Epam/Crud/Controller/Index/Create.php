<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Api\EntityRepositoryInterface;
use Epam\Crud\Model\EntityFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Create extends Action
{
    /**
     * @var EntityRepositoryInterface
     */
    private $entityRepository;

    /**
     * @var EntityFactory
     */
    private $entityFactory;

    /**
     * @param Context $context
     * @param EntityRepositoryInterface $entityRepository
     * @param EntityFactory $entityFactory
     */
    public function __construct(
        Context $context,
        EntityRepositoryInterface $entityRepository,
        EntityFactory $entityFactory
    ) {
        parent::__construct($context);

        $this->entityRepository = $entityRepository;
        $this->entityFactory = $entityFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $entity = $this->entityFactory->create();
        $date = gmdate('Y-m-d H:i:s');
        $entity->setName('Snippet created by CRUD module')
            ->setCreatedAt($date)
            ->setUpdatedAt($date)
            ->setIsActive(1);
        $this->entityRepository->save($entity);

        $this->getResponse()->appendBody(__('New item added with id %1', $entity->getId()));
    }
}
