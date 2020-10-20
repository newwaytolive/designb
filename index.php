<?php

use user\Administrator;
use user\Customer;
use user\Seller;
use \user\UserManager;

require_once './vendor/autoload.php';

$customer = new Customer(1, 'John', '100.55', '34');
$seller = new Seller(2, 'Alex', '550.87', '781');
$administrator = new Administrator(3, 'Arnold', '{reports, sales, users}');
$neo = new Administrator(0, 'Neo', '{kung-fu}');

$userManager = new UserManager();

echo $userManager->getUserInfo($customer);
echo $userManager->getUserInfo($seller);
echo $userManager->getUserInfo($administrator);

echo PHP_EOL . "Welcome to the real world!";
echo $userManager->getUserInfo($neo);
