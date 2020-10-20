<?php


namespace user;

/**
 * Class Seller
 * @package user
 */
class Seller extends User
{
    /**
     * The human readable representation of user type
     * @var string
     */
    protected $user_type = 'Seller';

    /**
     * Balance od seller's earnings
     * @var float
     */
    public $earnings_balance = 0.0;

    /**
     * The number of seller's products
     * @var int
     */
    public $product_count = 0;

    /**
     * Seller constructor.
     * @param $id
     * @param string $name
     * @param float $earnings_balance
     * @param int $product_count
     */
    public function __construct($id, string $name, float $earnings_balance, int $product_count)
    {
        parent::__construct($id, $name);
        $this->earnings_balance = $earnings_balance;
        $this->product_count = $product_count;
    }

    /**
     * @inheritDoc
     */
    function getInfo(): array
    {
        $info = [
            'user-type' => $this->user_type,
            'id' => $this->id,
            'name' => $this->name,
            'earnings-balance' => $this->earnings_balance,
            'product-count' => $this->product_count,
        ];
        return $info;
    }

}
