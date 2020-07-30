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
* deploy file into Magento2 folder app/code/magepow/instagram. Run following commands

 ```
 php bin/magento setup:upgrade
 php bin/magento setup:static-content:deploy -f
 php bin/magento cache:flush
 ```

# Step 2: User guide

  ## 1. General configuration

  Login to magento admin, choose : stores->configuration->magepow->instagram
  
  ![Image of magento admin config](https://github.com/thuythunguyen/image/blob/master/config.PNG)

  Select yes to enable the module and configure name, accesstoken of your instagram and limitation
  
  ## 2. Instagram widget
  
   Choose content->wigdet then add widget
   
   ![Image of magento admin widget](https://github.com/thuythunguyen/image/blob/master/widget.PNG)
    
    
   Choose instagram widget
    
   ![Image of magento admin config widget ](https://github.com/thuythunguyen/image/blob/master/storefrontconfigwidget.PNG)
   
   * Theme : Slect blank or luma theme
   * Widget title : choose any title name that you want
   * Store view : Select kind of store views you want
   * Sorted order : Dertimine the order of the widget
   
   ![Image of magento admin config widget](https://github.com/thuythunguyen/image/blob/master/storefrontconfigwidgetlayout.PNG)
   
   * Display on : Select the page you want to display your instagram widget on
   * Container : Select the position of your widget
   
   Run the following command:
   
   ```
   php bin/magento cache:clean
   ```
  ## 3. Result
   
   ![Image of magento store front](https://github.com/thuythunguyen/image/blob/master/result.PNG)
      
**Free Extensions List**

* Magento 2 Recent Sales Notification

* [Magento 2 Categories Extension](https://magepow.com/magento-categories-extension.html)

* [Magento 2 Sticky Cart](https://magepow.com/magento-sticky-cart.html)

**Premium Extensions List**

* [Magento 2 Pages Speed Optimizer](https://magepow.com/magento2-speed-optimizer.html)

* [Magento 2 Mutil Translate](https://magepow.com/magento-multi-translate.html)

* [Magento 2 Instagram Integration](https://magepow.com/magento-2-instagram.html)

* [Magento 2 Lookbook Pin Products](https://magepow.com/lookbook-pin-products.html)






