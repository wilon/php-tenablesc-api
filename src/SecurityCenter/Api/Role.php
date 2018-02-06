<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter Role operation.
 *
 * @link   https://support.tenable.com/support-center/cerberus-support-center/includes/widgets/sc_api/Role.html
 * @author Weilong Wang <github.com/wilon>
 */
class Role extends AbstractApi
{
    /**
     * Gets the list of Roles.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/role', $fields);
    }

    /**
     * Adds a Role
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post("/role", $fields);
    }

    /**
     * Gets the Role associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/role/$id", $fields);
    }

    /**
     * Edits the Role associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/role/$id", $fields);
    }

    /**
     * Deletes the Role associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->delete("/role/$id");
    }

}
