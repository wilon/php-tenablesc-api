<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter Config operation.
 *
 * @link   https://support.tenable.com/support-center/cerberus-support-center/includes/widgets/sc_api/Configuration.html
 * @author Weilong Wang <github.com/wilon>
 */
class Config extends AbstractApi
{
    /**
     * Gets the system configuration types
     *
     * @return array  The api response.
     */
    public function all()
    {
        return $this->get("/config");
    }

    /**
     * Gets the configuration information associated with configuration type {id}.
     *
     * @param  string  $id
     *
     * @return array  The api response.
     */
    public function associate($id)
    {
        return $this->get("/config/$id");
    }

    /**
     * Edits the configuration information associated with configuration type {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/config/$id", $fields);
    }

    /**
     * Gets the status of the configuration type(s) specified
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function query($fields = [])
    {
        return $this->get("/config/query", $fields);
    }

    /**
     * Tests the LDAP settings
     *
     * @param  array  $fields
     *
     * @return string The api response.
     */
    public function testLDAP($fields = [])
    {
        return $this->post("/config/testLDAP", $fields);
    }

    /**
     * Tests the SMTP settings
     *
     * @param  array  $fields
     *
     * @return string The api response.
     */
    public function testSMTP($fields = [])
    {
        return $this->post("/config/testSMTP", $fields);
    }

    /**
     * Registers a license file
     *
     * @param  array  $fields
     *
     * @return string The api response.
     */
    public function licenseRegister($fields = [])
    {
        return $this->post("/config/license/register", $fields);
    }

    /**
     * Registers the plugin specified
     *
     * @param  array  $fields
     *
     * @return string The api response.
     */
    public function pluginsRegister($fields = [])
    {
        return $this->post("/config/plugins/register", $fields);
    }

    /**
     * Resets the plugin codes for the plugin type parameter specified
     *
     * @param  array  $fields
     *
     * @return string The api response.
     */
    public function pluginsReset($fields = [])
    {
        return $this->post("/config/plugins/reset", $fields);
    }

}
