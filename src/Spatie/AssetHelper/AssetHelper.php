<?php namespace Spatie\AssetHelper;

use File;
use Illuminate\Config\Repository;

class AssetHelper{

    protected $config;

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }
    /**
     * Get the url for the asset
     *
     * @param $assetName
     * @return string
     */
    public function getUrl($assetName) {
        return $this->getPublicBaseUrl() . '/' . $this->getRevisionedFileName($assetName);
    }

    /**
     * Get the revisioned name of the asset
     *
     * @param $asset
     * @return string
     */
    public function getRevisionedFileName($asset)
    {
        $globSearchString = pathinfo($asset, PATHINFO_FILENAME) .'.*.' . File::extension($asset);
        $globResults = glob($this->config->get('asset-helper::publicPath') . '/' . $globSearchString);

        return count($globResults) ? pathinfo($globResults[0], PATHINFO_BASENAME) : '';
    }

    /**
     * Get the public url to where the revisioned assets are stored
     *
     * @return string
     */
    public function getPublicBaseUrl()
    {
        return str_replace(public_path(), '', $this->config->get('asset-helper::publicPath'));
    }

}