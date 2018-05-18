<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter Asset operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Asset.html
 * @author Weilong Wang <github.com/wilon>
 */
class Asset extends AbstractApi
{
    /**
     * Gets the list of Assets.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/asset', $fields);
    }

    /**
     * Adds an Asset.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post('/asset', $fields);
    }

    /**
     * Gets the Asset associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/asset/$id", $fields);
    }

    /**
     * Edits the Asset associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/asset/$id", $fields);
    }

    /**
     * Deletes the Asset associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->delete("/asset/$id");
    }

    /**
     * Imports an Asset specified by a previously uploaded, plain text XML file.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function import($fields = [])
    {
        return $this->post("/asset/import", $fields);
    }

    /**
     * Exports the Asset associated with {id} as plain text XML.
     *
     * @return array  A XML response.
     */
    public function export($id)
    {
        return $this->get("/asset/$id/export");
    }

    /**
     * Starts an on-demand recalculation of the Asset files associated with {id}, minus any LDAP querying or Hostname resolution. This includes the Accessible Asset files of Asset {id} and any, affected Defining Assets files.
     *
     * @param  string  $id
     * @param  array   $fields
     *
     * @return array  The api response.
     */
    public function refresh($id, $fields = [])
    {
        return $this->post("/asset/$id/refresh", $fields);
    }

    /**
     * Tests an LDAP query, depending on access and permissions.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function testLDAPQuery($fields = [])
    {
        return $this->post("/asset/testLDAPQuery", $fields);
    }

    /**
     * Shares the Asset associated with {id}, depending on access and permissions
     *
     * @param  string  $id
     * @param  array   $fields
     *
     * @return array  The api response.
     */
    public function share($id, $fields = [])
    {
        return $this->post("/asset/$id/share", $fields);
    }

    /**
     * Gets the full list of unique Asset tags
     *
     * @return array  The api response.
     */
    public function tag()
    {
        return $this->get("/asset/tag");
    }

}
