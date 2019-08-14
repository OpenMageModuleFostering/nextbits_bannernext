<?php
class Nextbits_BannerNext_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
     * Path for config.
     */
    const XML_CONFIG_PATH = 'bannernext/general/';

    /**
     * Name library directory.
     */
    const NAME_DIR_JS = 'bannernext/jquery/';

    /**
     * List files for include.
     *
     * @var array
     */
    protected $_files = array(
        'jquery-1.8.1.min.js',
        'jquery.noconflict.js',
    );

    /**
     * Check enabled.
     *
     * @return bool
     */
    public function isJqueryEnabled()
    {
        return (bool) $this->_getConfigValue('jquery', $store = '');
    }

    /**
     * Return path file.
     *
     * @param $file
     *
     * @return string
     */
    public function getJQueryPath($file)
    {
        return self::NAME_DIR_JS . $file;
    }

    /**
     * Return list files.
     *
     * @return array
     */
    public function getFiles()
    {
        return $this->_files;
    }

	public function isBannerNextModuleEnabled()
    {
        return (bool) $this->_getConfigValue('active', $store = '');
    }
	
	public function isResponsiveBannerEnabled()
    {
        return (bool) $this->_getConfigValue('responsive_banner', $store = '');
    }
	
    protected function _getConfigValue($key, $store)
    {
        return Mage::getStoreConfig(self::XML_CONFIG_PATH . $key, $store = '');
    }
	
	public function resizeImg($fileName,$width,$height='')
	{
		$baseURL = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
		$imageURL = $baseURL .'/'.'bannernext'.'/'.$fileName;
		
		$basePath = Mage::getBaseDir('media');
		$imagePath = $basePath.DS.'bannernext'.str_replace('/', DS,$fileName);
		
		$extra =$width . 'x' . $height;
		$newPath = Mage::getBaseDir('media') . DS .'bannernext'.DS."resized".DS.$extra.str_replace('/', DS,$fileName);
		//if width empty then return original size image's URL
		if ($width != '' && $height != '') {
			//if image has already resized then just return URL
			if (file_exists($imagePath) && is_file($imagePath) && !file_exists($newPath)) {
				$imageObj = new Varien_Image($imagePath);
				$imageObj->constrainOnly(TRUE);
				$imageObj->keepAspectRatio(FALSE);
				$imageObj->keepFrame(FALSE);
				//$width, $height - sizes you need (Note: when keepAspectRatio(TRUE), height would be ignored)
				$imageObj->resize($width, $height);
				$imageObj->save($newPath);
			}
			$resizedURL = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . "bannernext".'/'."resized".'/'.$extra.'/'.$fileName;
		 } else {
			$resizedURL = $imageURL;
		 }
		 return $resizedURL;
	}
	
}