<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Api\EntityRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;

class Crud extends Action
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
        $id = (int)$this->getRequest()->getParam('id');
        if (!is_numeric($id)) {
            throw new NotFoundException(__('id must be set.'));
        }
        $item = $this->entityRepository->getById($id);
        $this->getResponse()->appendBody($item->getName());
    }
}
