<?php
/*
 * PHP version 7
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

namespace Webjump\HelloWorld\Setup\Patch\Data;

use \Magento\Framework\Exception\InputException;
use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\Exception\State\InputMismatchException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

use Webjump\HelloWorld\Api\PetRepositoryInterface;
use Webjump\HelloWorld\Model\Data\PetFactory;

class FirstDataPatch implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var PetFactory
     */
    private $petFactory;

    /**
     * @var PetRepositoryInterface
     */
    private $petRepository;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PetFactory $petFactory
     * @param PetRepositoryInterface $petRepository
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PetFactory $petFactory,
        PetRepositoryInterface $petRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->petFactory = $petFactory;
        $this->petRepository = $petRepository;
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    /**
     * @return $this|FirstDataPatch
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        try {
            $this->savePetsData($this->getPetsInfo());
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        $this->moduleDataSetup->getConnection()->endSetup();

        return $this;
    }

    /**
     * @param array $petsInfos
     * @return void
     * @throws InputException
     * @throws LocalizedException
     * @throws InputMismatchException
     */
    public function savePetsData(array $petsInfos): void
    {
        foreach ($petsInfos as $petInfo) {
            $pet = $this->petFactory->create()
                ->setOwnerId($petInfo['owner_id'])
                ->setPetName($petInfo['pet_name'])
                ->setPetOwner($petInfo['pet_owner'])
                ->setOwnerTelephone($petInfo['owner_telephone']);

            $this->petRepository->save($pet);
        }
    }

    /**
     * @return array[]
     */
    public function getPetsInfo(): array
    {
        return [
            [
                'owner_id' => 1,
                'pet_name' => 'Loki',
                'pet_owner' => 'Michel',
                'owner_telephone' => '(11) 98574-9584'
            ],
            [
                'owner_id' => 2,
                'pet_name' => 'Fenrir',
                'pet_owner' => 'Gustavo',
                'owner_telephone' => '(21) 98495-0095'
            ],
            [
                'owner_id' => 3,
                'pet_name' => 'Mary',
                'pet_owner' => 'Olívia',
                'owner_telephone' => '(11) 97495-0594'
            ],
            [
                'owner_id' => 3,
                'pet_name' => 'Bastet',
                'pet_owner' => 'Olívia',
                'owner_telephone' => '(11) 97495-0594'
            ],
        ];
    }
}
