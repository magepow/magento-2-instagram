<?php
/**
 * @Author: Alex Dong
 * @Date:   2020-04-15 18:40:02
 * @Last Modified by:   nguyen
 * @Last Modified time: 2020-08-18 18:51:49
 */

namespace Magepow\Instagram\Block\Widget;

class Instagram extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{

    public $_helper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magepow\Instagram\Helper\Data $helper,
        array $data = []
    ) {

        $this->_helper = $helper;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {

        $data = $this->_helper->getConfigModule('general');
        if($data['slide']){
            $data['vertical-Swiping'] = $data['vertical'];
            $breakpoints = $this->getResponsiveBreakpoints();
            $responsive = '[';
            $num = count($breakpoints);
            foreach ($breakpoints as $size => $opt) {
                $item = (int) $data[$opt];
                $responsive .= '{"breakpoint": "'.$size.'", "settings": {"slidesToShow": "'.$item.'"}}';
                $num--;
                if($num) $responsive .= ', ';
            }
            $responsive .= ']';
            $data['center-Mode']    = $data['center_mode'];
            $data['autoplay-Speed'] = $data['autoplay_speed'];
            $data['slides-To-Show'] = $data['visible'];
            $data['swipe-To-Slide'] = 'true';
            $data['responsive'] = $responsive;
        }

        $this->addData($data);

        parent::_construct();

    }

    public function getResponsiveBreakpoints()
    {
        return array(1921=>'visible', 1920=>'widescreen', 1480=>'desktop', 1200=>'laptop', 992=>'notebook', 768=>'tablet', 576=>'landscape', 481=>'portrait', 361=>'mobile', 1=>'mobile');
    }

    public function getSlideOptions()
    {
        return array('autoplay', 'arrows', 'speed', 'autoplay-Speed', 'center-Mode', 'dots', 'fade', 'infinite', 'padding', 'vertical', 'vertical-Swiping', 'responsive', 'rows', 'slides-To-Show', 'swipe-To-Slide');
    }

    public function getFrontendCfg()
    { 
        if($this->getSlide()) return $this->getSlideOptions();

        $this->addData(array('responsive' =>json_encode($this->getGridOptions())));
        return array('padding', 'responsive');

    }

    public function getGridOptions()
    {
        $options = array();
        $breakpoints = $this->getResponsiveBreakpoints(); ksort($breakpoints);
        foreach ($breakpoints as $size => $screen) {
            $options[]= array($size-1 => $this->getData($screen));
        }
        return $options;
    }

}
