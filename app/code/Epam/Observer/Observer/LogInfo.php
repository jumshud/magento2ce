<?php
declare(strict_types = 1);

namespace Epam\Observer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class LogInfo implements ObserverInterface
{
    /**
     * @var LoggerInterface
    */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        $message = 'Requst URI: ' . $observer->getRequest()->getRequestUri();
        $this->logger->info($message);
    }
}
