<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter analysis operation.
 *
 * @link   https://docs.tenable.com/sccv/api/Analysis.html
 * @author Weilong Wang <github.com/wilon>
 */
class Analysis extends AbstractApi
{

    /**
     * Processes a query for analysis
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function all($fields = [])
    {
        return $this->post("/analysis", $fields);
    }

    /**
     * Downloads an analysis of a Query
     *
     * @param  array  $fields
     *
     * @return None given.
     */
    public function download($fields = [])
    {
        return $this->post('/analysis/download', $fields);
    }

}
