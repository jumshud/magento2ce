<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Api\EntityRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;

class Delete extends Action
{
    /**
     * @var EntityRepositoryInterface
     */
    private $entityRepository;

    /**
     * @param Context $context
     * @param EntityRepositoryInterface $entityRepository
     */
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

        if (!is_numeric($id) || $id <= 0) {
            throw new NotFoundException(__('Incorrect id parameter.'));
        }
        $this->entityRepository->deleteById($id);
        $this->getResponse()->appendBody(__('Item with id %1 deleted successfully', $id));
    }
}
