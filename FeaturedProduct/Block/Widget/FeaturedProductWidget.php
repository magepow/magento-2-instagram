<?php
namespace Magepow\FeaturedProduct\Block\Widget;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
class FeaturedProductwidget extends Template implements BlockInterface
{
    protected $_template = "widget/featuredproductwidget.phtml";
    const DEFAULT_PRODUCTS_COUNT = 8;
    protected $_productCount;
    protected $httpContext;
    protected $_catalogProductVisibility;
    protected $_imageHelper;
    protected $_cartHelper;
    protected $_wishlistHelper;
    protected $_getCompareProduct;
    protected $_reviewFactory;
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        \Magento\Framework\App\Http\Context $httpContext,
         \Magento\Review\Model\ReviewFactory $reviewFactory,
        // \Magento\Wishlist\Helper $wishlistHelper,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogProductVisibility = $catalogProductVisibility;
        $this->httpContext = $httpContext;
        $this->_imageHelper = $context->getImageHelper();
        $this->_cartHelper = $context->getCartHelper();
        $this->_reviewFactory = $reviewFactory;
        // $this->_wishlistHelper = $context->getWishlistHelper();
        // $this->_getCompareProduct = $context->getCompareProduct();
        parent::__construct(
            $context,
            $data
        );
    }
    /**
     * Image helper Object
     */
    public function imageHelperObj(){
        return $this->_imageHelper;
    }
    public function getRatingSummary($product) {
        $this->_reviewFactory->create()->getEntitySummary($product, $this->_storeManager->getStore()->getId());
    $ratingSummary = $product->getRatingSummary()->getRatingSummary();
    return $ratingSummary;
    }
    /**
	* wishlist helper
	*/
	// public function wishlistHelperObj($product,$item = []){
	// 	return $this->_wishlistHelper->getAddParams($product,$item);
	// }
	/**
	* compareProduct helper
	*/
	// public function compareHelperObj(){
	// 	return $this->_getCompareProduct;
	// }


    public function getFeaturedProduct(){
        $limit      = $this->getProductLimit();
        $collection = $this->_productCollectionFactory->create();
        $collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());
        $collection->addMinimalPrice()
            ->addFinalPrice()
            ->addTaxPercents()
            ->setPageSize($limit)
            ->addAttributeToSelect('*')
            ->addAttributeToFilter('is_featured' , '1');
        return $collection;
    }
    public function getProductLimit() {
        if($this->getData('productcount')==''){
            return DEFAULT_PRODUCTS_COUNT ;
        }
        return $this->getData('productcount');
    }
    public function getAddToCartUrl($product, $additional = [])
    {
        return $this->_cartHelper->getAddUrl($product, $additional);
    }
    
    public function getProductPriceHtml(
        \Magento\Catalog\Model\Product $product,
        $priceType = null,
        $renderZone = \Magento\Framework\Pricing\Render::ZONE_ITEM_LIST,
        array $arguments = []
    ) {
        // if (!isset($arguments['zone'])) {
        //     $arguments['zone'] = $renderZone;
        // }
        // $arguments['zone'] = isset($arguments['zone'])
        //     ? $arguments['zone']
        //     : $renderZone;
        // $arguments['price_id'] = isset($arguments['price_id'])
        //     ? $arguments['price_id']
        //     : 'old-price-' . $product->getId() . '-' . $priceType;
        // $arguments['include_container'] = isset($arguments['include_container'])
        //     ? $arguments['include_container']
        //     : true;
        // $arguments['display_minimal_price'] = isset($arguments['display_minimal_price'])
        //     ? $arguments['display_minimal_price']
        //     : true;
        /** @var \Magento\Framework\Pricing\Render $priceRender */
        $priceRender = $this->getLayout()->getBlock('product.price.render.default');
        $price = '';
        if ($priceRender) {
            $price = $priceRender->render(
                \Magento\Catalog\Pricing\Price\FinalPrice::PRICE_CODE,
                $product,
                $arguments
            );
        }
        return $price;
    }
}