<?php


namespace user;

/**
 * Class Customer
 * @package user
 */
class Customer extends User
{
    /**
     * The type of user instance
     * @var string
     */
    protected $user_type = 'Customer';

    /**
     * User's balance
     * @var float
     */
    public $balance = 0.0;

    /**
     * Total count of user's perchasea
     * @var integer
     */
    public $purchase_count = 0;

    /**
     * Customer constructor.
     * @param $id
     * @param string $name
     * @param float $balance
     * @param int $purchase_count
     * @throws \Exception
     */
    public function __construct($id, string $name, float $balance, int $purchase_count)
    {
        parent::__construct($id, $name);
        $this->balance = $balance;
        $this->purchase_count = $purchase_count;
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
            'balance' => $this->balance,
            'purchase-count' => $this->purchase_count,
        ];
        return $info;
    }

}
