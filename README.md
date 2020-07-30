# magento2-instagram
# rerequisites

Before you continue, ensure you meet the following requirements:

  * You have installed magento2
  * You are using a Linux or Mac OS machine. Windows is not currently supported.
  Install magento2-instagram extension

# Step 1 : Download magento2-instagram extension

 a. Install via composer (recommend)
Run the following commands in Magento 2 root folder:

composer require magepow/instagram
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f

b. Install manual
* extract file from archive
* deploy file into Magento2 folder app/code/magepow/instagram. Run following commands

 php bin/magento setup:upgrade
 php bin/magento setup:static-content:deploy -f
 php bin/magento cache:flush

# Step 2: User guide

  1. General configuration

  Login to magento admin, choose : stores->configuration->magepow->instagram
  
  ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture1.PNG)

  Select yes to enable the module
  

  2. Instagram widget

    Choose content->wigdet then add widget
    
    ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture1.PNG)
    
    Choose instagram widget and other options you want
    
    ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture3.PNG)

    ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture4.PNG)
     
     Run the following command:
      
     php bin/magento cache:clean
      
      #Lisence
      The megapow-instagram extension is open-sourced software licensed under the Megapow
      




