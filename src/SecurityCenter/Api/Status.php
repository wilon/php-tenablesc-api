<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter Status operation.
 *
 * @link   https://support.tenable.com/support-center/cerberus-support-center/includes/widgets/sc_api/Status.html
 * @author Weilong Wang <github.com/wilon>
 */
class Status extends AbstractApi
{

    /**
     * PGets a collection of status information, including license.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get("/status", $fields);
    }

}
