<?php

namespace AliasProject\Plaid\Contracts;

/**
 * The Plaid User required to submit UserService requests.
 */
interface User
{
    /**
     * The user's ACCESS_TOKEN
     *
     * @return string
     */
    public function accessToken();
}
