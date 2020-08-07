<?php

namespace Magepow\FeaturedProduct\Setup;
use Magento\Eav\Model\Entity;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\InstallDataInterface;
//use Magento\Eav\Model\Config;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        // $this->eavConfig = $eavConfig;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'is_featured',
                [
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Is Featured Product',
                    'input' => 'boolean',
                    'class' => '',
                    'source' => '\Magento\Eav\Model\Entity\Attribute\Source\Boolean',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => true,
                    'user_defined' => false,
                    'default' => '1',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
                    'option' => [
                        'values' => [
                            0 => 'No',
                            1 => 'Yes'
                        ],
                    ],
                ]
            );
    }
}
        // if (version_compare($context->getVersion(),'2.2.2','<')){
        //     $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        //     $attributeCode = 'last_login_at';

        //     // add/update frontend_model to the attribute
        //     $eavSetup->addAttribute(
        //         \Magento\Customer\Model\Customer::ENTITY, // customer entity code
        //         $attributeCode,
        //     [
        //         'Last login',
        //         \Magento\Eav\Model\Entity\Attribute\Frontend\Datetime::class
        //         ]
        //     );
        // }

//        if (version_compare($context->getVersion(),'2.2.6','<')){
//            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
//            $attributeCode = 'last_login_at';
//
//            // add/update frontend_model to the attribute
//            $eavSetup->addAttribute(
//                \Magento\Customer\Model\Customer::ENTITY, // customer entity code
//                $attributeCode,
//                [
//
//                    'label'=>"Last Login",
//                    'type'=> \Magento\Eav\Model\Entity\Attribute\Frontend\Datetime::class,
//                    'input'        => 'text',
//                    'required'     => false,
//                    'visible'      => true,
//                    'user_defined' => true,
//                    'position'     => 999,
//                    'system'       => 0,
//
//                ]
//            );
//            $lastLogin = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, $attributeCode);
//
////            $used_in_forms[]= 'adminhtml_checkout';
////            $used_in_forms[]='adminhtml_customer';
////            $used_in_forms[]='adminhtml_customer_address';
////            $used_in_forms[]='customer_account_edit';
////            $used_in_forms[]= 'customer_address_edit';
////            $used_in_forms[]='customer_register_address';
//            $lastLogin->setData(
//                'used_in_forms',
//                ['adminhtml_customer']
//            );
//            $lastLogin->save();
//        }
//         if (version_compare($context->getVersion(),'2.2.17','<')){
//             $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
// //            $attributeCode = 'last_login_at';

//             // add/update frontend_model to the attribute
//             $eavSetup->addAttribute(
//                 \Magento\Customer\Model\Customer::ENTITY, // customer entity code
//                 'last_login_at',
//                 [

//                     'label' =>"Last Login",
//                     'type' => 'datetime',
//                     'input' => 'date',
//                     'frontend' => \Magento\Eav\Model\Entity\Attribute\Frontend\Datetime::class,
//                     'backend' => \Magento\Eav\Model\Entity\Attribute\Backend\Datetime::class,
//                     'required' => false,
//                     'user_defined' => true,
//                     'visible' => true,
//                     'system' => false,
//                     'input_filter' => 'date',
//                     'validate_rules' => '{"input_validation":"date"}',
//                     'position'     => 999,


//                 ]
//             );

//             $eavSetup->addAttributeToSet(
//                 \Magento\Customer\Api\CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
//                 \Magento\Customer\Api\CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
//                 null,
//                 'last_login_at');

//             $lastLogin = $this->eavConfig->getAttribute(\Magento\Customer\Model\Customer::ENTITY, 'last_login_at');

//            $used_in_forms[]= 'adminhtml_checkout';
//            $used_in_forms[]='adminhtml_customer';
//            $used_in_forms[]='adminhtml_customer_address';
//            $used_in_forms[]='customer_account_edit';
//            $used_in_forms[]= 'customer_address_edit';
//            $used_in_forms[]='customer_register_address';
        //     $lastLogin->setData(
        //         'used_in_forms',
        //         ['customer_account_edit','adminhtml_customer','customer_account_create'] // thay work voi moi cai nay :v
        //     );
        //     $lastLogin->save(); // sao ko save :(
        // }
        // $setup->endSetup();
//     }
// }