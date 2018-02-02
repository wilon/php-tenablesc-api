<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter ticket operation.
 *
 * @link   https://support.tenable.com/support-center/cerberus-support-center/includes/widgets/sc_api/Ticket.html
 * @author Weilong Wang <github.com/wilon>
 */
class Ticket extends AbstractApi
{
    /**
     * Gets the list of Tickets.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->get('/ticket', $fields);
    }

    /**
     * Adds a Ticket.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function add($fields = [])
    {
        return $this->post("/ticket", $fields);
    }

    /**
     * Gets the Ticket associated with {id}.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function associate($id, $fields = [])
    {
        return $this->get("/ticket/$id", $fields);
    }

    /**
     * Edits the Ticket associated with {id}, changing only the passed in fields.
     *
     * @param string  $id
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function edit($id, $fields = [])
    {
        return $this->patch("/ticket/$id", $fields);
    }

}
