<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock")) {
    return;
}

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock=array(
	"-" => GetMessage("IBLOCK_ANY"),
);

$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch()) {
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arSorts = array("ASC"=>GetMessage("SORT_ORDER_ASC_TITLE"), "DESC"=>GetMessage("SORT_ORDER_DESC_TITLE"));

$arSortFields = array(
    "ID"=>GetMessage("T_IBLOCK_DESC_FID"),
    "NAME"=>GetMessage("T_IBLOCK_DESC_FNAME"),
    "ACTIVE_FROM"=>GetMessage("T_IBLOCK_DESC_FACT"),
    "SORT"=>GetMessage("T_IBLOCK_DESC_FSORT"),
    "TIMESTAMP_X"=>GetMessage("T_IBLOCK_DESC_FTSAMP"),
    "RAND"=>GetMessage("T_IBLOCK_DESC_FRAND")
);

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y"
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_IBLOCK"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y"
		),

		"AMOUNT_ELEMENTS" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_AMOUNT_ELEMENTS"),
			"DEFAULT" => 2
        ),

		"CACHE_TIME"  =>  Array("DEFAULT"=>3600),

        "ALL_SALONS_URL" => array(
			"PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_DETAIL_URL")
		),

		"SHOW_MAP" => Array(
			"NAME" => GetMessage("SHOW_MAP"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N"
		),

		"SORT_TYPE" => Array(
            "NAME" => GetMessage("SORT_TYPE"),
            "TYPE" => 'LIST',
            "VALUES" => $arSorts,
			"DEFAULT" => "DESC"
		),

		"SORT_PROP" => Array(
			"NAME" => GetMessage("SORT_PROP"),
			"TYPE" => 'LIST',
			"VALUES" => $arSortFields,
			"DEFAULT" => "RAND"
		)
	)
);
?>
