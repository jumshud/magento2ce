<?php
declare(strict_types=1);

namespace Learning\FirstUnit\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Raw extends Action
{
    /**
     * Raw page action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setHeader('Content-Type', 'image/jpeg')
            ->setContents(file_get_contents('https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_1280.jpg'));

        return $result;
    }
}
