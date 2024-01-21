<?php

namespace diamondgold\DummyEnchantments;

use pocketmine\crafting\CraftingManagerFromDataHelper;
use pocketmine\crafting\json\ItemStackData;
use pocketmine\data\bedrock\BedrockDataFiles;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\data\bedrock\EnchantmentIds;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\inventory\CreativeInventory;
use pocketmine\item\enchantment\AvailableEnchantmentRegistry;
use pocketmine\item\enchantment\IncompatibleEnchantmentRegistry;
use pocketmine\item\enchantment\ItemEnchantmentTags;
use pocketmine\item\enchantment\StringToEnchantmentParser;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\item\ItemTypeIds;
use pocketmine\plugin\PluginBase;
use ReflectionClass;

final class Main extends PluginBase
{
    protected function onEnable(): void
    {
        $data = [
            EnchantmentIds::DEPTH_STRIDER => [
                "name" => "Depth Strider",
                "instance" => DummyEnchantments::DEPTH_STRIDER(),
                "primaryTags" => [
                    ItemEnchantmentTags::BOOTS
                ],
            ],
            EnchantmentIds::AQUA_AFFINITY => [
                "name" => "Aqua Affinity",
                "instance" => DummyEnchantments::AQUA_AFFINITY(),
                "primaryTags" => [
                    ItemEnchantmentTags::HELMET
                ],
            ],
            EnchantmentIds::SMITE => [
                "name" => "Smite",
                "instance" => DummyEnchantments::SMITE(),
                "primaryTags" => [
                    ItemEnchantmentTags::SWORD,
                    ItemEnchantmentTags::AXE,
                ],
            ],
            EnchantmentIds::BANE_OF_ARTHROPODS => [
                "name" => "Bane of Arthropods",
                "instance" => DummyEnchantments::BANE_OF_ARTHROPODS(),
                "primaryTags" => [
                    ItemEnchantmentTags::SWORD,
                    ItemEnchantmentTags::AXE,
                ],
                "secondaryTags" => [],
            ],
            EnchantmentIds::LOOTING => [
                "name" => "Looting",
                "instance" => DummyEnchantments::LOOTING(),
                "primaryTags" => [
                    ItemEnchantmentTags::SWORD,
                ],
            ],
            EnchantmentIds::LUCK_OF_THE_SEA => [
                "name" => "Luck of the Sea",
                "instance" => DummyEnchantments::LUCK_OF_THE_SEA(),
                "primaryTags" => [
                    ItemEnchantmentTags::FISHING_ROD,
                ],
            ],
            EnchantmentIds::LURE => [
                "name" => "Lure",
                "instance" => DummyEnchantments::LURE(),
                "primaryTags" => [
                    ItemEnchantmentTags::FISHING_ROD,
                ],
            ],
            EnchantmentIds::FROST_WALKER => [
                "name" => "Frost Walker",
                "instance" => DummyEnchantments::FROST_WALKER(),
                "secondaryTags" => [
                    ItemEnchantmentTags::BOOTS,
                ],
            ],
            EnchantmentIds::BINDING => [
                "name" => "Curse of Binding",
                "instance" => DummyEnchantments::BINDING(),
                "secondaryTags" => [
                    ItemEnchantmentTags::HELMET,
                    ItemEnchantmentTags::CHESTPLATE,
                    ItemEnchantmentTags::LEGGINGS,
                    ItemEnchantmentTags::BOOTS,
                ],
            ],
            EnchantmentIds::IMPALING => [
                "name" => "Impaling",
                "instance" => DummyEnchantments::IMPALING(),
                "primaryTags" => [
                    ItemEnchantmentTags::TRIDENT,
                ],
            ],
            EnchantmentIds::RIPTIDE => [
                "name" => "Riptide",
                "instance" => DummyEnchantments::RIPTIDE(),
                "primaryTags" => [
                    ItemEnchantmentTags::TRIDENT,
                ],
            ],
            EnchantmentIds::LOYALTY => [
                "name" => "Loyalty",
                "instance" => DummyEnchantments::LOYALTY(),
                "primaryTags" => [
                    ItemEnchantmentTags::TRIDENT,
                ],
            ],
            EnchantmentIds::CHANNELING => [
                "name" => "Channeling",
                "instance" => DummyEnchantments::CHANNELING(),
                "primaryTags" => [
                    ItemEnchantmentTags::TRIDENT,
                ],
            ],
            EnchantmentIds::MULTISHOT => [
                "name" => "Multishot",
                "instance" => DummyEnchantments::MULTISHOT(),
                "primaryTags" => [
                    ItemEnchantmentTags::CROSSBOW,
                ],
            ],
            EnchantmentIds::PIERCING => [
                "name" => "Piercing",
                "instance" => DummyEnchantments::PIERCING(),
                "primaryTags" => [
                    ItemEnchantmentTags::CROSSBOW,
                ],
            ],
            EnchantmentIds::QUICK_CHARGE => [
                "name" => "Quick Charge",
                "instance" => DummyEnchantments::QUICK_CHARGE(),
                "primaryTags" => [
                    ItemEnchantmentTags::CROSSBOW,
                ],
            ],
            EnchantmentIds::SOUL_SPEED => [
                "name" => "Soul Speed",
                "instance" => DummyEnchantments::SOUL_SPEED(),
                "primaryTags" => [
                    ItemEnchantmentTags::BOOTS,
                ],
            ],
        ];
        $reflectionClass = new ReflectionClass(EnchantmentIds::class);
        /**
         * @var string $name
         * @var int $id
         */
        foreach ($reflectionClass->getConstants() as $name => $id) {
            if (EnchantmentIdMap::getInstance()->fromId($id) === null) { // don't override existing enchantments
                if (!isset($data[$id])) {
                    $this->getLogger()->debug("Enchantment $name is not supported yet");
                    continue;
                }
                EnchantmentIdMap::getInstance()->register($id, $data[$id]["instance"]);
                AvailableEnchantmentRegistry::getInstance()->register(
                    $data[$id]["instance"],
                    $data[$id]["primaryTags"] ?? [],
                    $data[$id]["secondaryTags"] ?? []
                );
                StringToEnchantmentParser::getInstance()->register($data[$id]["name"], fn() => $data[$id]["instance"]);
            }
        }
        IncompatibleEnchantmentRegistry::getInstance()->register("boots", [DummyEnchantments::DEPTH_STRIDER(), DummyEnchantments::FROST_WALKER()]);
        IncompatibleEnchantmentRegistry::getInstance()->register("sword", [VanillaEnchantments::SHARPNESS(), DummyEnchantments::BANE_OF_ARTHROPODS(), DummyEnchantments::SMITE()]);
        IncompatibleEnchantmentRegistry::getInstance()->register("trident", [DummyEnchantments::CHANNELING(), DummyEnchantments::LOYALTY(), DummyEnchantments::RIPTIDE()]);
        IncompatibleEnchantmentRegistry::getInstance()->register("crossbow", [DummyEnchantments::MULTISHOT(), DummyEnchantments::PIERCING()]);
        /*
        // Failed... is there nothing I can do about those enchanted books with no enchantments? ¯\(°_o)/¯
        foreach (CreativeInventory::getInstance()->getAll() as $index => $item) {
            if ($item->getTypeId() === ItemTypeIds::ENCHANTED_BOOK && !$item->hasEnchantments()) {
                CreativeInventory::getInstance()->remove($item);
                var_dump("Remove " . $item->getName() . " from creative inventory" . CreativeInventory::getInstance()->getItem($index) === null ? " (success)" : " (failed)");
            }
        }
        */
        // maybe remove all enchanted books then add back those with enchantments?
        $items = [];
        foreach (CreativeInventory::getInstance()->getAll() as $item) {
            if ($item->getTypeId() !== ItemTypeIds::ENCHANTED_BOOK || $item->hasEnchantments()) {
                $items[] = $item;
            }
        }
        CreativeInventory::getInstance()->clear();
        foreach ($items as $item) {
            CreativeInventory::getInstance()->add($item);
        }
        // reload enchanted books with those enchantments
        $creativeItems = CraftingManagerFromDataHelper::loadJsonArrayOfObjectsFile(
            BedrockDataFiles::CREATIVEITEMS_JSON,
            ItemStackData::class
        );
        foreach ($creativeItems as $data) {
            if ($data->name === ItemTypeNames::ENCHANTED_BOOK) {
                $item = CraftingManagerFromDataHelper::deserializeItemStack($data);
                if ($item) {
                    CreativeInventory::getInstance()->add($item);
                }
            }
        }
    }
}