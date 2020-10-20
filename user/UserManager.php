<?php

namespace user;

/**
 * Class UserManager
 * Those who knows everything about users
 * @package user
 */
class UserManager
{
    /**
     * String representation of information about particular user
     * @param IUser $user
     * @return string
     */
    public function getUserInfo(IUser $user): string
    {
        $userInfo = $user->getInfo();
        return '// ' . implode(PHP_EOL . '// ', $userInfo);
    }

}
