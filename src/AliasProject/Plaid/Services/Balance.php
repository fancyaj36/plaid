<?php

namespace AliasProject\Plaid\Services;

use AliasProject\Plaid\Contracts\User;

/**
 * The balance endpoint returns the real-time balance of a
 * user's accounts. It may be used for existing users that
 * were added via any of Plaid's products. The Current Balance
 * is the total amount of funds in the account. The Available
 * Balance is the Current Balance less any outstanding holds
 * or debits that have not yet posted to the account. Note
 * that not all institutions calculate the Available Balance.
 * In the case that Available Balance is unavailable from the
 * institution, Plaid will either return an Available Balance
 * value of null or only return a Current Balance.
 *
 * https://plaid.com/docs/api/#balance
 */
class Balance extends Base\Service
{
    /**
     * Get the data this service returns
     *
     * @param  User   $user
     * @param  array $options
     *
     * @return \AliasProject\Plaid\Contracts\Http\Response
     */
    public function get(User $user, array $options = [])
    {
        return $this->request->post($this->endpoint(), [
            'access_token' => $user->accessToken(),
        ]);
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Get the main endpoint for this service
     *
     * @param  string|null $path
     *
     * @return string
     */
    protected function endpoint($path = null)
    {
        return $this->path('balance', $path);
    }
}
