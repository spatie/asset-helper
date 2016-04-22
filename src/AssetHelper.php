<?php namespace Spatie\AssetHelper;

class AssetHelper{

    /**
     * Get the url for the asset
     *
     * @param $assetName
     *
     * @return string
     */
    public function getUrl($assetName) {
        return config('asset-helper.assetDirectoryUrl') . '/' .
            $this->getRevisionedFileName($assetName);
    }

    /**
     * Get the revisioned name of the asset
     *
     * @param $asset
     *
     * @return string
     */
    public function getRevisionedFileName($asset)
    {
        $globSearchString = pathinfo($asset, PATHINFO_DIRNAME) . '/' .
            pathinfo($asset, PATHINFO_FILENAME) .'.*.' .
            pathinfo($asset, PATHINFO_EXTENSION);

        $globResults = glob(public_path() .
            config('asset-helper.assetDirectoryUrl') . '/' . $globSearchString
        );

        if (!count($globResults)) {
            return '';
        }

        return pathinfo($asset, PATHINFO_DIRNAME) . '/' . pathinfo($globResults[0], PATHINFO_BASENAME);
    }

}
