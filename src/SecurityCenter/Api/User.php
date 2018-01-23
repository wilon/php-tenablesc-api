<?php

namespace SecurityCenter\Api;

use SecurityCenter\Exception\InvalidArgumentException;

/**
 * Getting user information.
 *
 * @link   https://support.tenable.com/support-center/cerberus-support-center/includes/widgets/sc_api/User.html
 * @author Weilong Wang <github.com/wilon>
 */
class User extends AbstractApi
{
    /**
     * Gets the list of Users.
     *
     * @param  array  $fields The fields parameter should be specified along the query string
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
        if (!$id) {
            throw new InvalidArgumentException("User associated with {id}!");
        }
        return $this->get("/user/$id", $fields);
    }

}
