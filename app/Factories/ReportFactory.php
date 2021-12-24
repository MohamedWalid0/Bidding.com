<?php

namespace App\Factories;

class ReportFactory
{
    public function getType($reportType)
    {
        if ($reportType === null) {
            return false;
        }
        if (strcasecmp(trim($reportType), 'user') === 0) {
            return new ReportUser();
        }
        if (strcasecmp(trim($reportType), 'product') === 0) {
            return new ReportProduct();
        }
        return false;
    }
}
