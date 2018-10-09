<?
use Bitrix\Main\Localization\Loc;

if (empty($_REQUEST['q'])) {
    $sSectionName = Loc::getMessage('SEARCH_TITLE');
} else {
    $sSectionName = Loc::getMessage('SEARCH_RESULT_TITLE');
}

$arDirProperties = array(
    'title' => (empty($_REQUEST['q'])?Loc::getMessage('SEARCH_TITLE'):getMessage('SEARCH_RESULT_TITLE'))
);