# magento2-instagram
# rerequisites

Before you continue, ensure you meet the following requirements:

  * You have installed magento2
  * You are using a Linux or Mac OS machine. Windows is not currently supported.
  Install magento2-instagram extension

# Step 1 : Download magento2-instagram extension

 ## Install via composer (recommend)
Run the following commands in Magento 2 root folder:
```
composer require magepow/instagram
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
```
  ## Install manual
  
* extract file from archive
* deploy file into Magento2 folder `app/code/magepow/instagram`. Run following commands

 ```
 php bin/magento setup:upgrade
 php bin/magento setup:static-content:deploy -f
 php bin/magento cache:flush
 ```

# Step 2: User guide

  ## 1. General configuration

  Login to magento admin, choose `stores->configuration->magepow->instagram`
  
  ![Image of magento admin config](https://github.com/magepow/magento2-instagram/blob/master/media/config.PNG)

  Select `yes` to enable the module and configure name, accesstoken of your instagram and limitation
  
  ## 2. Instagram widget
  
   Choose `content->wigdet` then add widget
   
   ![Image of magento admin widget](https://github.com/magepow/magento2-instagram/blob/master/media/widget.PNG)
    
    
   Choose instagram widget
    
   ![Image of magento admin config widget ](https://github.com/magepow/magento2-instagram/blob/master/media/storefrontcofigwidget.PNG)
   
   * Theme : Select blank or luma theme
   * Widget title : choose any title name that you want
   * Store view : Select kind of store views you want
   * Sorted order : Dertimine the order of the widget
   
   ![Image of magento admin config widget](https://github.com/magepow/magento2-instagram/blob/master/media/storefrontcofigwidgetlayout.PNG)
   
   * Display on : Select the page you want to display your instagram widget on
   * Container : Select the position of your widget
   
   Run the following command:
   
   ```
   php bin/magento cache:clean
   ```
  ## 3. Result
   
   ![Image of magento store front](https://github.com/magepow/magento2-instagram/blob/master/media/result.PNG)
   
 ## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :) 

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/paypalme/alopay)

      
**Free Extensions List**

* [Magento 2 Recent Sales Notification](https://magepow.com/magento-2-recent-sales-notification.html)

* [Magento 2 Categories Extension](https://magepow.com/magento-categories-extension.html)

* [Magento 2 Sticky Cart](https://magepow.com/magento-sticky-cart.html)

**Premium Extensions List**

* [Magento 2 Pages Speed Optimizer](https://magepow.com/magento2-speed-optimizer.html)

* [Magento 2 Mutil Translate](https://magepow.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://magepow.com/magento-2-instagram.html)

* [Magento 2 Lookbook Pin Products](https://magepow.com/lookbook-pin-products.html)

**Featured Magento Themes**

* [Expert Multipurpose responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/expert-premium-responsive-magento-2-and-1-support-rtl-magento-2-/21667789)

* [Gecko Premium responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/gecko-responsive-magento-2-theme-rtl-supported/24677410)

* [Milano Fashion responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/milano-fashion-responsive-magento-1-2-theme/12141971)

* [Electro responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/electro-responsive-magento-1-2-theme/17042067)

* [Pizzaro Food responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/pizzaro-food-responsive-magento-1-2-theme/19438157)

* [Biolife Organic responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/biolife-organic-food-magento-2-theme-rtl-supported/25712510)

* [Market responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/market-responsive-magento-2-theme/22997928)

* [Kuteshop responsive Magento 2 Theme](https://1.envato.market/c/1314680/275988/4415?u=https://themeforest.net/item/kuteshop-multipurpose-responsive-magento-1-2-theme/12985435)

**Featured Magento Services**

* [PSD to Magento 2 Theme Conversion](https://magepow.com/psd-to-magento-theme-conversion.html)

* [Magento Speed Optimization Service](https://magepow.com/magento-speed-optimization-service.html)

* [Magento Security Patch Installation](https://magepow.com/magento-security-patch-installation.html)

* [Magento Website Maintenance Service](https://magepow.com/website-maintenance-service.html)

* [Magento Professional Installation Service](https://magepow.com/professional-installation-service.html)

* [Magento Upgrade Service](https://magepow.com/magento-upgrade-service.html)

* [Customization Service](https://magepow.com/customization-service.html)

* [Hire Magento Developer](https://magepow.com/hire-magento-developer.html)

[![Latest Stable Version](https://poser.pugx.org/magepow/productzoom/v/stable)](https://packagist.org/packages/magepow/instagram)
[![Total Downloads](https://poser.pugx.org/magepow/productzoom/downloads)](https://packagist.org/packages/magepow/instagram)








