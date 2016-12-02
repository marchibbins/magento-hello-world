<?php

class HelloWorld_Model_Observer {

    public function sales_quote_item_set_product ($observer) {
        $quote = $observer->getQuoteItem()->getQuote();
        $items = $quote->getAllItems();
        foreach ($items as $item) {
            if ($item->getProduct()->getId() == 1) {
                $quote->removeItem($item->getItemId())->save();
            }
        }
    }

    public function catalog_product_is_salable_after ($observer) {
        if ($observer['product']->getId() == 1) {
            $observer['product']['is_salable'] = 0;
        }
    }

}

?>
