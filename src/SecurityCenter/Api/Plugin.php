<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter plugin operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Plugin.html
 * @author Weilong Wang <github.com/wilon>
 */
class Plugin extends AbstractApi
{

    /**
     * Gets all the Plugins matching the filters, if provided.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get("/plugin", $fields);
    }

    /**
     * Gets the Plugin associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/plugin/$id", $fields);
    }

}
