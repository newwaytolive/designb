<?php


namespace user;

/**
 * Class User
 * Base class for different types of users in the system
 * @package user
 */
abstract class User implements IUser
{
    /**
     * The human readable representation of user type
     * @var string
     */
    protected $user_type = '';

    /**
     * @var integer|null
     */
    public $id;

    /**
     * @var string
     */
    public $name = '';

    /**
     * User constructor.
     * @param integer|null $id
     * @param string $name
     */
    public function __construct($id, string $name)
    {
        if (empty($this->user_type)) {
            $this->user_type = get_class();
        }
        $this->id = $id;
        $this->name = $name;
    }

}
