<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter token operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Token.html
 * @author Weilong Wang <github.com/wilon>
 */
class Token extends AbstractApi
{

    /**
     * Logs the specified User into SecurityCenter and establishes a token for subsequent requests.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function login($fields = [])
    {
        return $this->post("/token", $fields);
    }

    /**
     * Deletes the token associated with the logged in User.
     *
     * @param  array  $fields
     *
     * @return None given.
     */
    public function logout()
    {
        return $this->deleted('/token', $fields);
    }

}
