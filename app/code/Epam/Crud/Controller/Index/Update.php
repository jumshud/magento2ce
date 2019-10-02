<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Api\EntityRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Update extends Action
{
    /**
     * @var EntityRepositoryInterface
     */
    private $entityRepository;

    public function __construct(Context $context, EntityRepositoryInterface $entityRepository)
    {
        parent::__construct($context);
        $this->entityRepository = $entityRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $entity = $this->entityRepository->getById(6);
        $entity->setUpdatedAt(gmdate('Y-m-d H:i:s'))
            ->setIsActive(0);
        $this->entityRepository->save($entity);

        $this->getResponse()->appendBody(__('Item with id %1 successfully updated', $entity->getId()));
    }
}
