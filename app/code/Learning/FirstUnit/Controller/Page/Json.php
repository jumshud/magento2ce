<?php

namespace Learning\FirstUnit\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Json extends Action
{
    /**
     * Json page action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $data = [
            'success' => 1,
            'message' => 'first unit created'
        ];

        return $result->setData($data);
    }
}
