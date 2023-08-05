<?php

namespace Mirchaye\ShoppingCart\Contracts;

interface ShoppingCartInterface
{
    /**
     * @param $itemData
     * @return void
     */
    public function addItem($itemData): void;

    /**
     * @param $itemId
     * @return void
     */
    public function removeItem($itemId): void;

    /**
     * @param $cartUUID
     * @param $itemId
     * @param $newItemData
     * @return void
     */
    public function updateItem($cartUUID, $itemId, $newItemData): void;

    /**
     * @param $taxRate
     * @return void
     */
    public function setTaxRate($taxRate): void;

    /**
     * @param $itemData
     * @return void
     */
    public function addItemWithVAT($itemData): void;

    /**
     * @param $itemData
     * @return void
     */
    public function addItemWithoutVAT($itemData): void;

    /**
     * @param $instance
     * @param $itemData
     * @return void
     */
    public function addInstanceCart($instance, $itemData): void;

    /**
     * @return int|float
     */
    public function getTotal(): int|float;

    /**
     * @return int|float
     */
    public function getSubtotal(): int|float;

    /**
     * @return int|float
     */
    public function getTax(): int|float;
}
