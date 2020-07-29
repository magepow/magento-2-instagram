# magento2-instagram
# rerequisites

Before you continue, ensure you meet the following requirements:

  * You have installed magento2
  * You are using a Linux or Mac OS machine. Windows is not currently supported.
  Install magento2-instagram extension

# Step 1 : Download magento2-instagram extension

  You can either clone or download manually this module on https://github.com/magepow/magento2-instagram

  Run following command:

  git clone https://github.com/magepow/magento2-instagram

  php bin/magento setup:upgrade

  php bin/magento setup:static-content:deploy

  Make sure your module file flows under the path app/code/module-file

# Step 2: User guide

  1. How to configure

  Login to magento admin, choose : stores->configuration->magepow->instagram
  
  ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture1.PNG)

  Config as you want then save

  2. Instagram widget

    Choose content->wigdet then add widget
    
    ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture2.PNG)
    
    Choose instagram widget and other options you want
    
    ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture3.PNG)

    ![Image of magento admin](https://github.com/thuythunguyen/image/blob/master/Capture4.PNG)
     
     Run the following command:
      
     php bin/magento cache:clean
      
      #Lisence
      The megapow-instagram extension is open-sourced software licensed under the Megapow
      




