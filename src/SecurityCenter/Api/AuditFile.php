<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter AuditFile operation.
 *
 * @link   https://docs.tenable.com/sccv/api/AuditFile.html
 * @author Weilong Wang <github.com/wilon>
 */
class AuditFile extends AbstractApi
{
    /**
     * Gets the list of AuditFiles.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get("/auditFile", $fields);
    }

    /**
     * Adds an AuditFile.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post("/auditFile", $fields);
    }

    /**
     * Gets the AuditFile associated with {id}.
     *
     * @param  string  $id
     * @param  array   $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/auditFile/$id", $fields);
    }

    /**
     * Edits the AuditFile associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/auditFile/$id", $fields);
    }

    /**
     * Deletes the AuditFile associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->deleted("/auditFile/$id");
    }

    /**
     * Refreshes the AuditFile associated with {id} to use the latest template version, depending on access and permissions.
     *
     * @param  string  $id
     *
     * @return array  The api response.
     */
    public function refresh($id)
    {
        return $this->post("/auditFile/$id/refresh");
    }

    /**
     * Shares the AuditFile associated with {id}, depending on access and permissions
     *
     * @param  string  $id
     * @param  array   $fields
     *
     * @return array  The api response.
     */
    public function share($id, $fields = [])
    {
        return $this->post("/auditFile/$id/share", $fields);
    }

    /**
     * Exports the AuditFile associated with {id} as plain text XML, depending on access and permissions
     *
     * @return array  A XML response.
     */
    public function export($id)
    {
        return $this->get("/auditFile/$id/export");
    }

}
