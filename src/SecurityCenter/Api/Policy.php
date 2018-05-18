<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter policy operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Scan-Policy.html
 * @author Weilong Wang <github.com/wilon>
 */
class Policy extends AbstractApi
{
    /**
     * Gets the list of Policies.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/policy', $fields);
    }

    /**
     * Adds a Policy (or AppPolicy).
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post("/policy", $fields);
    }

    /**
     * Gets the Policy associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/policy/$id", $fields);
    }

    /**
     * Edits the Policy associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/policy/$id", $fields);
    }

    /**
     * Deletes the Policy associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function delete($id, $fields = [])
    {
        return $this->delete("/policy/$id", $fields);
    }

    /**
     * Copies the Policy associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function copy($id, $fields = [])
    {
        return $this->post("/policy/$id/copy", $fields);
    }

    /**
     * Export policy with {id}.
     *
     * @param string  $id
     *
     * @return string The response will be an xml file containing the Scan Policy.
     */
    public function export($id)
    {
        return $this->post("/policy/$id/export");
    }

    /**
     * Shares the Policy associated with {id}, depending on access and permissions
     *
     * @param string  $id
     *
     * @return string The api response.
     */
    public function share($id)
    {
        return $this->post("/policy/$id/share");
    }

    /**
     * Import policy.
     *
     * @param string  $id
     *
     * @return string The api response.
     */
    public function import($fields)
    {
        return $this->post("/policy/import");
    }

    /**
     * Gets the full list of unique Policy tags
     *
     * @param string  $id
     *
     * @return string The api response.
     */
    public function tag()
    {
        return $this->get("/policy/tag");
    }

}
