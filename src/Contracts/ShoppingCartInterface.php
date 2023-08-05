<?php

namespace Mirchaye\ShoppingCart\Contracts;

interface ShoppingCartInterface
{
    public function addItem($itemData): void;

    public function removeItem($itemId): void;

    public function updateItem($cartUUID, $itemId, $newItemData): void;

    public function setTaxRate($taxRate): void;

    public function addItemWithVAT($itemData): void;

    public function addItemWithoutVAT($itemData): void;

    public function addInstanceCart($instance, $itemData): void;

    public function getTotal(): int|float;

    public function getSubtotal(): int|float;

    public function getTax(): int|float;
}
