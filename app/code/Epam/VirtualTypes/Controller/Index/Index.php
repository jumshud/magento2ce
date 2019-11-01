<?php
declare(strict_types=1);

namespace Epam\VirtualTypes\Controller\Index;

use Epam\VirtualTypes\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @param Context $context
     * @param Session $session
     */
    public function __construct(Context $context, Session $session)
    {
        parent::__construct($context);

        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->getResponse()->appendBody($this->session->getNamespace());
    }
}
