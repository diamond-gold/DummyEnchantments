<?php

namespace diamondgold\DummyEnchantments;

use pocketmine\data\bedrock\EnchantmentIds;
use pocketmine\item\enchantment\Rarity;
use pocketmine\utils\RegistryTrait;

/**
 * @method static DummyEnchantment DEPTH_STRIDER()
 * @method static DummyEnchantment AQUA_AFFINITY()
 * @method static DummyEnchantment SMITE()
 * @method static DummyEnchantment BANE_OF_ARTHROPODS()
 * @method static DummyEnchantment LOOTING()
 * @method static DummyEnchantment LUCK_OF_THE_SEA()
 * @method static DummyEnchantment LURE()
 * @method static DummyEnchantment FROST_WALKER()
 * @method static DummyEnchantment BINDING()
 * @method static DummyEnchantment IMPALING()
 * @method static DummyEnchantment RIPTIDE()
 * @method static DummyEnchantment LOYALTY()
 * @method static DummyEnchantment CHANNELING()
 * @method static DummyEnchantment MULTISHOT()
 * @method static DummyEnchantment PIERCING()
 * @method static DummyEnchantment QUICK_CHARGE()
 * @method static DummyEnchantment SOUL_SPEED()
 */
final class DummyEnchantments
{
    use RegistryTrait;

    protected static function setup(): void
    {
        self::_registryRegister("Depth_Strider", new DummyEnchantment(
            "Depth Strider",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Aqua_Affinity", new DummyEnchantment(
            "Aqua Affinity",
            Rarity::COMMON,
            0,
            0,
            1,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Smite", new DummyEnchantment(
            "Smite",
            Rarity::COMMON,
            0,
            0,
            5,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Bane_of_Arthropods", new DummyEnchantment(
            "Bane of Arthropods",
            Rarity::COMMON,
            0,
            0,
            5,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Looting", new DummyEnchantment(
            "Looting",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Luck_of_the_Sea", new DummyEnchantment(
            "Luck of the Sea",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Lure", new DummyEnchantment(
            "Lure",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Frost_Walker", new DummyEnchantment(
            "Frost Walker",
            Rarity::COMMON,
            0,
            0,
            2,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Binding", new DummyEnchantment(
            "Binding",
            Rarity::COMMON,
            0,
            0,
            1,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Impaling", new DummyEnchantment(
            "Impaling",
            Rarity::COMMON,
            0,
            0,
            5,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Riptide", new DummyEnchantment(
            "Riptide",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Loyalty", new DummyEnchantment(
            "Loyalty",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Channeling", new DummyEnchantment(
            "Channeling",
            Rarity::COMMON,
            0,
            0,
            1,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Multishot", new DummyEnchantment(
            "Multishot",
            Rarity::COMMON,
            0,
            0,
            1,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Piercing", new DummyEnchantment(
            "Piercing",
            Rarity::COMMON,
            0,
            0,
            4,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Quick_Charge", new DummyEnchantment(
            "Quick Charge",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
        self::_registryRegister("Soul_Speed", new DummyEnchantment(
            "Soul Speed",
            Rarity::COMMON,
            0,
            0,
            3,
            fn(int $level): int => 0,
            0
        ));
    }
}