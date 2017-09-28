<?php

namespace AliasProject\Plaid\Services\Base;

use AliasProject\Plaid\Contracts\User;

/**
 * Same as a normal service, but also provides an
 * instance of UserManager and a get method to get
 * the endpoint's main data.
 */
abstract class UserService extends Service
{
    /**
     * Instance of UserManager
     *
     * @var \AliasProject\Plaid\Services\Base\UserManager
     */
    private $user;

    /**
     * Get an instance of UserManager
     *
     * @return \AliasProject\Plaid\Services\Base\UserManager
     */
    public function user()
    {
        if ( isset($this->user) ) {
            return $this->user;
        }

        return $this->user = new UserManager($this->request, $this->endpoint());
    }

    /**
     * Get the data this service returns
     *
     * @param  User   $user
     * @param  array  $options
     *
     * @return \AliasProject\Plaid\Contracts\Http\Response
     */
    public function get(User $user, array $options = [])
    {
        return $this->request->post($this->endpoint('get'), [
            'access_token' => $user->accessToken(),
            'options' => $options,
        ]);
    }
}
