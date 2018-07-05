<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter Alert operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Alert.html
 * @author Weilong Wang <github.com/wilon>
 */
class Alert extends AbstractApi
{
    /**
     * Gets the list of Alerts.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/alert', $fields);
    }

    /**
     * Adds an Alert.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post("/alert", $fields);
    }

    /**
     * Gets the Alert associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/alert/$id", $fields);
    }

    /**
     * Edits the Alert associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/alert/$id", $fields);
    }

    /**
     * Deletes the Alert associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->deleted("/alert/$id");
    }

    /**
     * Executes the Alert associated with {id}, depending on access and permissions
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function execute($id)
    {
        return $this->deleted("/alert/$id/execute");
    }

}
