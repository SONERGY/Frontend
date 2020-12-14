<?php
class Logout extends Controller
{

    public function index()
    {
        $cookie_name = 'token';
        unset($_COOKIE[$cookie_name]);
        // empty value and expiration one hour before
        $res = setcookie($cookie_name, '', time() - 36000000);

        redirect_to("/");
    }
}
