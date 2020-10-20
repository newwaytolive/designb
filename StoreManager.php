<?php

class StoreManager
{

    /*
    * @var DatabaseManager $dbManager
    */
    protected $dbManager = null;

    /*
    * @param DatabaseManager $dbManager
    */
    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    /*
    * @param int $storeId
    *
    * return float
    */
    public function calculateStoreEarnings(int $storeId)
    {
        $totalAmount = 0.0;
        /**
         * @todo For better performance we can try
         * START TRANSACTION READ ONLY
         */
        $tagCount = $this->getTotalUniqueTags();

        foreach ($this->getProducts($storeId) as $product) {
            $orderItemsCount = $this->getOrderItemsCount($product['id']);

            $productTotalAmount = $product['price'] * $orderItemsCount;

            $tags = $this->getProductTags($product['id']);

            $productTotalAmount *= (1 + count($tags) / $tagCount);

            foreach ($tags as $tag) {
                if ($tag['tag_name'] == 'Christmas') {
                    $productTotalAmount *= 1.01;
                }

                if ($tag['tag_name'] == 'Free') {
                    $productTotalAmount *= 0.5;
                }
            }
            $totalAmount += $productTotalAmount;
        }
        /**
         * @todo COMMIT (see above)
         */

        return $totalAmount;
    }

    /*
    * @param int $storeId
    *
    * return array
    */
    protected function getProducts(int $storeId)
    {
        $query = 'SELECT * FROM product WHERE store_id = :store';

        return $this->dbManager->getData($query, ['store' => $storeId]);
    }

    /*
    * @param int $productId
    *
    * return array
    */
    protected function getOrderItems(int $productId)
    {
        $query = 'SELECT * FROM orderitem WHERE product_id = :product';

        return $this->dbManager->getData($query, ['product' => $productId]);
    }

    /*
    * @param int $productId
    *
    * return int
    */
    protected function getOrderItemsCount(int $productId)
    {
        $query = 'SELECT COUNT(*) as count FROM orderitem WHERE product_id = :product';

        $result = $this->dbManager->getData($query, ['product' => $productId]);

        return $result['count'];
    }

    /*
    * @param int $productId
    *
    * return array
    */
    protected function getProductTags(int $productId)
    {
        $query = 'SELECT * FROM tag WHERE id IN (SELECT tag_id FROM tagConnect WHERE product_id= :product)';

        return $this->dbManager->getData($query, ['product' => $productId]);
    }

    /*
    * return int
    */
    public function getTotalUniqueTags()
    {
        /**
         * @todo As an option for better performance we can consider adding uniq index and remove DISTINCT
         * ALTER TABLE `tag` ADD UNIQUE INDEX `tag_name` (`tag_name`);
         */
        $query = 'SELECT COUNT(DISTINCT tag_name) as count FROM tag';

        $result = $this->dbManager->getData($query, []);

        return $result['count'];
    }

}
