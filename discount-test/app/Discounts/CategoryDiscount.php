<?php
namespace App\Discounts;

use App\Products;

class CategoryDiscount
{

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function getCategoryDiscount()
    {

        $categoriesQuantities = $this->getProductCategoryIds($this->items);
        $discountMessage      = '';

        if ($this->getTotalQuantityPerCategory($categoriesQuantities, 2) >= 5) {
            $discountMessage = 'Got a sixth product for free from category "Switches"<br>';
        }

        if ($this->getTotalQuantityPerCategory($categoriesQuantities, 1) >= 2) {
            $discountMessage = $discountMessage . ' Got a 20% discount on the cheapest product from category "Tools"<br>';
        }

        return ($discountMessage != '') ? $discountMessage : false;
    }

    private function getProductCategoryIds($items)
    {
        foreach ($items as $key => $item) {
            $categoryId                   = Products::where('product_id', $item['product-id'])->firstOrFail()->category;
            $categories[$key]['category'] = $categoryId;
            $categories[$key]['quantity'] = $item['quantity'];
        }
        return $categories;
    }

    private function getTotalQuantityPerCategory($categoriesQuantities, $categoryId)
    {
        foreach ($categoriesQuantities as $category) {
            if ($category['category'] == $categoryId) {
                $quantity[] = +$category['quantity'];
            }
        }
        return array_sum($quantity);
    }
}