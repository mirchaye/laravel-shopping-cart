<?php

namespace Mirchaye\ShoppingCart;

use Mirchaye\ShoppingCart\Contracts\ShoppingCartInterface;

class ShoppingCart implements ShoppingCartInterface
{
    private array $carts = [];

    private int|float $taxRate;

    protected array $requiredKeys = ['id', 'name', 'price', 'quantity'];

    /**
     * Add an item to the default cart instance.
     *
     * @param  array  $itemData
     */
    public function addItem($itemData): void
    {
        $this->validateItemData($itemData);

        $this->carts['default'][] = $itemData;
    }

    /**
     * Remove the item from the default cart instance.
     *
     * @param  string  $itemId
     */
    public function removeItem($itemId): void
    {
        foreach ($this->carts['default'] as $key => $item) {
            if ($item['id'] === $itemId) {
                unset($this->carts['default'][$key]);
                break;
            }
        }
    }

    /**
     * Update the item from any instance of the cart using the cart UUID.
     *
     * @param  string  $cartUUID
     * @param  string  $itemId
     * @param  array  $newItemData
     */
    public function updateItem($cartUUID, $itemId, $newItemData): void
    {
        foreach ($this->carts[$cartUUID] as $key => $item) {
            if ($item['id'] === $itemId) {
                $this->carts[$cartUUID][$key] = $newItemData;
                break;
            }
        }
    }

    /**
     * Set the tax rate for the cart.
     *
     * @param  float  $taxRate
     */
    public function setTaxRate($taxRate): void
    {
        $this->taxRate = $taxRate > 0 ? $taxRate : config('shopping-cart.tax_rate', default: 0);
    }

    /**
     * Get the tax rate for the cart.
     */
    public function getTaxRate(): float|int
    {
        return $this->taxRate;
    }

    /**
     * Add an item to the cart with VAT.
     *
     * @param  array  $itemData
     */
    public function addItemWithVAT($itemData): void
    {
        $this->validateItemData($itemData);

        // Apply VAT to the item price
        $itemData['price'] *= (1 + ($this->taxRate / 100));

        $this->carts['default'][] = $itemData;
    }

    /**
     * Add an item to the cart without VAT.
     *
     * @param  array  $itemData
     */
    public function addItemWithoutVAT($itemData): void
    {
        $this->validateItemData($itemData);

        $this->carts['default'][] = $itemData;
    }

    /**
     * Add an item to a specific instance of the cart.
     *
     * @param  string  $instance
     * @param  array  $itemData
     */
    public function addInstanceCart($instance, $itemData): void
    {
        $this->validateItemData($itemData);

        $this->carts[$instance][] = $itemData;
    }

    /**
     * Get the total amount in the cart.
     */
    public function getTotal(): float|int
    {
        $total = 0;

        foreach ($this->carts as $cart) {
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        }

        return $total;
    }

    /**
     * Get the subtotal amount in the cart.
     */
    public function getSubtotal(): float|int
    {
        $subtotal = 0;

        foreach ($this->carts['default'] as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return $subtotal;
    }

    /**
     * Get the tax amount in the cart.
     */
    public function getTax(): float|int
    {
        return $this->getTotal() - $this->getSubtotal();
    }

    /**
     * Change the cart instance of an item.
     */
    public function changeCartItemInstance(string $cartUUID, string $itemId, string $newCartUUID): void
    {
        foreach ($this->carts[$cartUUID] as $key => $item) {
            if ($item['id'] === $itemId) {
                $itemToMove = $this->carts[$cartUUID][$key];
                unset($this->carts[$cartUUID][$key]);
                $this->carts[$newCartUUID][] = $itemToMove;
                break;
            }
        }
    }

    /**
     * Validate the required keys in the item data array.
     *
     * @throws \InvalidArgumentException
     */
    private function validateItemData(array $itemData): void
    {
        if (count(array_diff($this->requiredKeys, array_keys($itemData))) > 0) {
            throw new \InvalidArgumentException("Invalid item data. The itemData array must contain 'id', 'name', 'price', and 'quantity'.");
        }
    }
}
