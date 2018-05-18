<?php

namespace SecurityCenter\Api;

/**
 * SecurityCenter System operation.
 *
 * @link   https://docs.tenable.com/sccv/api/System.html
 * @author Weilong Wang <github.com/wilon>
 */
class System extends AbstractApi
{

    /**
     * Gets the system initialization information.
     *
     * @return array  The api response.
     */
    public function all()
    {
        return $this->get("/system");
    }

    /**
     * Gets the system diagnostics information.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function diagnostics($fields = [])
    {
        return $this->get('/system/diagnostics', $fields);
    }

    /**
     * Starts an on-demand, diagnostics analysis for the System that can be downloaded after its job completes.
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function diagnosticsGenerate($fields = [])
    {
        return $this->post('/system/diagnostics/generate', $fields);
    }

    /**
     * Downloads the system diagnostics, debug file that was last generated.
     *
     * @return None given. The response will be a zipped or gzipped file containing the System's diagnostics information.
     */
    public function diagnosticsDownload()
    {
        return $this->post('/system/diagnostics/download');
    }

    /**
     * Retrieves the current Locale set in SecurityCenter.
     *
     * @return array  The api response.
     */
    public function locale()
    {
        return $this->get('/system/locale');
    }

    /**
     * Change the Locale to the one selected by the admin
     *
     * @param  array  $fields
     *
     * @return array  The api response.
     */
    public function localeChange($fields = [])
    {
        return $this->post('/system/locale/', $fields);
    }

    /**
     * States the current locale set in SecurityCenter.
     *
     * @return array  The api response.
     */
    public function locales()
    {
        return $this->post('/system/locales/');
    }

}
