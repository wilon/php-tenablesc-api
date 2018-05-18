<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter scanResult operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Scan-Result.html
 * @author Weilong Wang <github.com/wilon>
 */
class ScanResult extends AbstractApi
{
    /**
     * Gets the list of Scan Results.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/scanResult', $fields);
    }

    /**
     * Gets the Scan Result associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/scanResult/$id", $fields);
    }

    /**
     * Deletes the Scan Result associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     *
     * @return array  The api response.
     */
    public function delete($id)
    {
        return $this->delete("/scanResult/$id");
    }

    /**
     * Copies the Scan Result associated with {id}, depending on access and permissions.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function copy($id, $fields = [])
    {
        return $this->post("/scanResult/$id/copy", $fields);
    }

    /**
     * Send the Scan Result email.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function email($id, $fields = [])
    {
        return $this->post("/scanResult/$id/email", $fields);
    }

    /**
     * Re-imports the Scan Result associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function import($id, $fields = [])
    {
        return $this->post("/scanResult/$id/import", $fields);
    }

    /**
     * Stops the Scan Result associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function stop($id, $fields = [])
    {
        return $this->post("/scanResult/$id/stop", $fields);
    }

    /**
     * Pauses the Scan Result associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function pause($id, $fields = [])
    {
        return $this->post("/scanResult/$id/pause", $fields);
    }

    /**
     * Resumes the Scan Result associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function resume($id)
    {
        return $this->post("/scanResult/$id/resume");
    }

    /**
     * Downloads the Scan Result associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return None given. The response will be a scan file in binary or ascii format.
     */
    public function download($id)
    {
        return $this->post("/scanResult/$id/download");
    }

}
