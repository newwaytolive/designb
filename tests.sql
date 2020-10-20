-- Show Stores, that have products with Christmas, Winter Tags
SELECT DISTINCT s.*  FROM `store` s
INNER JOIN `product` p ON p.store_id = s.id
INNER JOIN `tagconnect` tc ON tc.product_id = p.id
INNER JOIN `tag` t ON t.id = tc.tag_id
WHERE t.tag_name IN ('Christmas', 'Winter')
;

-- Show Users, that never bought Product from Store with id == 5
SELECT DISTINCT u.* FROM `user` u
INNER JOIN `order` o  ON o.customer_id = u.id
INNER JOIN `orderitem` oi  ON oi.order_id = u.id
INNER JOIN `product` p  ON oi.product_id = p.id
WHERE p.store_id NOT IN (5)

-- Show Users, that had spent more than $1000
SELECT u.*, SUM(p.price) AS sum_total FROM `user` u
INNER JOIN `order` o  ON o.customer_id = u.id
INNER JOIN `orderitem` oi  ON oi.order_id = u.id
INNER JOIN `product` p  ON oi.product_id = p.id
GROUP BY u.id
HAVING sum_total > 1000
;


-- Show Stores, that have not any Sells



-- Show Mostly sold Tags




-- Show Monthly Store Earnings Statistics

