<?php
declare(strict_types=1);

namespace Epam\Plugin\Plugin\Magento\Theme\Block\Html;

use Magento\Theme\Block\Html\Breadcrumbs as BaseBreadcrumbs;

class Breadcrumbs
{
    /**
     * @param BaseBreadcrumbs $subject
     * @param string $crumbName
     * @param array $crumbInfo
     *
     * @return array
     */
    public function beforeAddCrumb(BaseBreadcrumbs $subject, string $crumbName, array $crumbInfo)
    {
        $crumbInfo['label'] = '(' . __($crumbInfo['label']) . ')';

        return [$crumbName, $crumbInfo];
    }
}
