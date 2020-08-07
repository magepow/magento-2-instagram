<?php

namespace Magepow\FeaturedProduct\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class FeaturedProductGrid extends \Magento\Backend\App\Action
{

    protected $_resultLayoutFactory;

    /**
     * @param \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
     * @param Action\Context $context
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
    ) {
        parent::__construct($context);
        $this->_resultLayoutFactory = $resultLayoutFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magepow_FeaturedProduct::featuredproduct');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        $resultLayout->getLayout()->getBlock('featuredproduct.edit.tab.products');
        $resultPage->getConfig()->getTitle()->prepend((__('FeaturedProduct')));
        return $resultLayout;
    }

}