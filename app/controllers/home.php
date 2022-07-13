<?php

defined("ABSPATH") ? '' : die();

if(Auth::access('cashier')) {
    require views_path('home');
}else{
    Auth::setMessage('You dont have permissions to this part! Logged as cashier or higher role!');
    require views_path('auth/denied');
}
