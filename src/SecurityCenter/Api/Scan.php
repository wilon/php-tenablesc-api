<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter scan operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Scan.html
 * @author Weilong Wang <github.com/wilon>
 */
class Scan extends AbstractApi
{
    /**
     * Gets the list of Scans.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/scan', $fields);
    }

    /**
     * Adds a Scan, depending on access and permissions.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post("/scan", $fields);
    }

    /**
     * Gets the Scan associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/scan/$id", $fields);
    }

    /**
     * Edits the Scan associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/scan/$id", $fields);
    }

    /**
     * Deletes the Scan associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->deleted("/scan/$id");
    }

    /**
     * Copies the Scan associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function copy($id, $fields = [])
    {
        return $this->post("/scan/$id/copy", $fields);
    }

    /**
     * Launches the Scan associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function launch($id, $fields = [])
    {
        return $this->post("/scan/$id/launch", $fields);
    }

}
