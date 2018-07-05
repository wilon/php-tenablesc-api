<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter zone operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Scan-Zone.html
 * @author Weilong Wang <github.com/wilon>
 */
class Zone extends AbstractApi
{

    /**
     * Gets the list of Zones
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get("/zone", $fields);
    }

    /**
     * Adds an Zone
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post('/zone', $fields);
    }

    /**
     * Gets the Zone associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/zone/$id", $fields);
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
        return $this->patch("/zone/$id", $fields);
    }

    /**
     * Deletes the Zone associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->deleted("/zone/$id");
    }

}
