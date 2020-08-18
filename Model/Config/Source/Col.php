<?php

/**
 * @Author: nguyen
 * @Date:   2020-08-18 18:23:59
 * @Last Modified by:   nguyen
 * @Last Modified time: 2020-08-18 18:25:51
 */

namespace Magepow\Instagram\Model\Config\Source;

class Col implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            '1'=>   __('1 item(s) /row'),
            '2'=>   __('2 item(s) /row'),
            '3'=>   __('3 item(s) /row'),
            '4'=>   __('4 item(s) /row'),
            '5'=>   __('5 item(s) /row'),
            '6'=>   __('6 item(s) /row'),
            '7'=>   __('7 item(s) /row'),
            '8'=>   __('8 item(s) /row'),
        ];
    }
}
