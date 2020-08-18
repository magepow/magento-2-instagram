<?php

/**
 * @Author: nguyen
 * @Date:   2020-08-18 18:23:59
 * @Last Modified by:   nguyen
 * @Last Modified time: 2020-08-18 18:26:05
 */

namespace Magepow\Instagram\Model\Config\Source;

class Row implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            '1'=>   __('1 row(s) /slider'),
            '2'=>   __('2 row(s) /slider'),
            '3'=>   __('3 row(s) /slider'),
            '4'=>   __('4 row(s) /slider'),
            '5'=>   __('5 row(s) /slider'),
        ];
    }
}
