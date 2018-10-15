<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

if (!\Bitrix\Main\Loader::includeModule('advertising')) {
    return;
}
Loc::loadMessages(__FILE__);

class AdvertisingBanner extends CBitrixComponent
{
	protected $arBanners;

	public function onPrepareComponentParams($params)	{
		$params['TYPE'] = (isset($params['TYPE']) ? trim($params['TYPE']) : '');

		if($params['NOINDEX'] <> 'Y')		{
			$params['NOINDEX'] = 'N';
		}

		if ($params['CACHE_TYPE'] == 'Y' || ($params['CACHE_TYPE'] == 'A' && Bitrix\Main\Config\Option::get('main', 'component_cache_on', 'Y') == 'Y'))		{
			$params['CACHE_TIME'] = intval($params['CACHE_TIME']);
		}		else		{
			$params['CACHE_TIME'] = 0;
		}

		if (isset($params['QUANTITY']) && intval($params['QUANTITY']) > 0)		{
			$params['QUANTITY'] =  intval($params['QUANTITY']);
		}		else		{
			$params['QUANTITY'] = 1;
		}

		$params['BANNER_ID'] = intval($params['BANNER_ID']);

		return $params;
	}

    protected function loadBanners($quantity)    {
        $this->arBanners = CAdvBanner::GetRandomArray($this->arParams['TYPE'], $quantity);

        if (!empty($this->arBanners) && is_array($this->arBanners)) {
            $this->getImagePath($this->arBanners);
            return $this->arBanners;
        } else {
            return array();
        }
    }

    protected function getImagePath(&$arItems)
    {
        foreach ($arItems as &$arItem) {
            if (!empty($arItem['IMAGE_ID'])) {
                $arItem['IMAGE_PATH'] = CFile::GetPath($arItem['IMAGE_ID']);
            }
        }
    }

	protected function registerBannerTags()	{
		if (defined('BX_COMP_MANAGED_CACHE'))		{
			$taggedCache = Main\Application::getInstance()->getTaggedCache();
			$taggedCache->registerTag('advertising_banner_type_'.$this->arParams['TYPE']);
		}
	}

	protected function setCache()	{
		global $USER;

		return $this->startResultCache(false, $USER->GetGroups());
	}

	public function executeComponent()	{
	    global $USER;
		$this->arResult = array(
			'BANNERS' => ''
		);

		if ($this->setCache())		{
		    if ($USER->IsAuthorized()){
		        $quanity = $this->arParams['QUANTITY'];
            } else {
		        $quanity = 1;
            }
            $this->arResult['BANNERS'] = $this->loadBanners($quanity);
            $this->registerBannerTags();

			$this->includeComponentTemplate();
		}
	}
}