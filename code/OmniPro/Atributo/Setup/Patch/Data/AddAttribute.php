<?php
namespace OmniPro\Atributo\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddAttribute implements DataPatchInterface{
/**
 *  @param \Magento\Framework\Setup\ModuleDataSetupInterface
 */
private $moduleDataSetup; 

/**
 * @param \Magento\Eav\Setup\EavSetupFactory
*/
private $eavSetupFactory;

    public function __construct(   
        \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
        ){
            $this->moduleDataSetup = $moduleDataSetup;
            $this->eavSetupFactory = $eavSetupFactory;
        }

public function apply(){
    $eavSetup= $this->eavSetupFactory->create(['setup'=>$this->moduleDataSetup]);

    $eavSetup->addAttribute('catalog_product', 'alternative_capacity',[
        'type' => 'text',
        'label' => 'Alternative capacity',
        'input' => 'text',
        'used_in_product_listing' => true,
        'user_defined' => true
    ]);

   $eavSetup->addAttribute('catalog_product',$eavSetup->getAttributeSetId('catalog_product','Bag'), 'Custom','alternative_capacity',5);
}

public function getAliases()
{
    return [];
}
public static function  getDependencies(){
    return []; 
}

}