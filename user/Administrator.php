<?php


namespace user;

/**
 * Class Administrator
 * @package user
 */
class Administrator extends User
{
    /**
     * The human readable representation of user type
     * @var string
     */
    protected $user_type = 'Administrator';

    /**
     * Example: "{reports, sales, users}"
     * @var string
     */
    public $permissions = '';

    /**
     * Administrator constructor.
     * @param $id
     * @param string $name
     * @param string $permissions
     */
    public function __construct($id, string $name, string $permissions)
    {
        parent::__construct($id, $name);
        $this->permissions = $permissions;
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
            'permissions' => $this->permissions,
        ];
        return $info;
    }

}
