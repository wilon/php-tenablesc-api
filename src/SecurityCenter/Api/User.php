<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter user operation.
 *
 * @link   https://docs.tenable.com/sccv/api/User.html
 * @author Weilong Wang <github.com/wilon>
 */
class User extends AbstractApi
{
    /**
     * Gets the list of Users.
     *
     * @param  array  $fields
     *
     * @return array  The api return about userinfo.
     */
    public function all($fields = [])
    {
        return $this->get('/user', $fields);
    }

    /**
     * Gets the User associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/user/$id", $fields);
    }

}
