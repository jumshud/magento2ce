<?php
declare(strict_types=1);

namespace Epam\Plugin\Plugin\Magento\Theme\Block\Html;

use Magento\Theme\Block\Html\Header as HtmlHeader;

class Header
{
    /**
     * @param HtmlHeader $subject
     * @param \Closure $proceed
     * @param array $args
     * @return string
     */
    public function aroundGetWelcome(HtmlHeader $subject, \Closure $proceed, ...$args)
    {
        $result = $proceed(...$args);

        return $result . ' Hi custom header';
    }

    /**
     * @param HtmlHeader $subject
     * @param string $result
     *
     * @return string
     */
    public function afterGetWelcome(HtmlHeader $subject, string $result = null)
    {
        if (empty($result)) {
            return $result;
        }

        return '--' . $result . '--';
    }
}
