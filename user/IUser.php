<?php

namespace user;

/**
 * Interface IUser
 * @package user
 */
interface IUser
{
    /**
     * Key-value pairs of user's properties
     * @return array
     */
    function getInfo(): array;

}
