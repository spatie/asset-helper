<?php namespace Spatie\AssetHelper;

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
        return $this->config->get('asset-helper::assetDirectoryUrl') . '/' . $this->getRevisionedFileName($assetName);
    }

    /**
     * Get the revisioned name of the asset
     *
     * @param $asset
     * @return string
     */
    public function getRevisionedFileName($asset)
    {
        $globSearchString = pathinfo($asset, PATHINFO_FILENAME) .'.*.' . pathinfo($asset, PATHINFO_EXTENSION);
        $globResults = glob(public_path() . $this->config->get('asset-helper::assetDirectoryUrl') . '/' . $globSearchString);

        return count($globResults) ? pathinfo($globResults[0], PATHINFO_BASENAME) : '';
    }

}