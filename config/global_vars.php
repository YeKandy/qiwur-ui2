<?php 

global $DEFAULT_USER, $allExtractors, $jobChangeMap, $crawlStatusChangeMap, $jobType2Status, $jsEvents,
$seedTemplate, $urlFilterTemplate, $textFilterTemplate, $blockFilterTemplate, $regexSampleExample, $httpCodes;

$DEFAULT_USER = array(
		'id' => 0,
		'email' => USER_ANONYMOUS_EMAIL,
		'name' => USER_ANONYMOUS_NAME,
		'password' => '',
		'avatar' => AVATAR_DEFAULT,
		'avatar_big' => AVATAR_DEFAULT,
		'group_id' => USER_GROUP_ID,
		'point' => 0, 'level' => 0, 'exp' => 0,
		'created' => '1970-01-01 00:00:00', 'modified' => '1970-01-01 00:00:00',
		'status' => 'ACTIVATED', 'gender' => '', 'birth' => '', 'referrer' => 0,
		'salary' => '', 'ip' => '');

$allExtractors = array(
		'TextExtractor' => 'TextExtractor',
		'GalleryExtractor' => 'GalleryExtractor',
		'LinkExtractor' => 'LinkExtractor',
		'ImageExtractor' => 'ImageExtractor',
		'LinksExtractor' => 'LinksExtractor',
		'RawExtractor' => 'RawExtractor',
		'ImagesExtractor' => 'ImagesExtractor'
);

$jobChangeMap = array(
		"NONE" => "INJECT",
		"INJECT" => "GENERATE",
		"GENERATE" => "FETCH",
		"FETCH" => "PARSE",
		"PARSE" => "UPDATEDB",
		"UPDATEDB" => "GENERATE"
);

$jobStateChangeMap = array(
		"NONE" => "INJECT",
		"INJECT" => "GENERATE",
		"GENERATE" => "FETCH",
		"FETCH" => "PARSE",
		"PARSE" => "UPDATEDB",
		"UPDATEDB" => "GENERATE"
);

$jsEvents = array(
		'focus',
		'blur',
		'click',
		'dblclick',
		'keydown',
		'keypress',
		'keyup',
		'mousedown',
		'mousemove',
		'mouseout',
		'mouseover',
		'mouseup'
);

$seedTemplate =
<<<END
http://www.example.com/QiwurInputTemplate
http://www.example.com/products
http://www.example.com/hotels
END;

$urlFilterTemplate =
<<<END
-http://www.example.com/QiwurInputTemplate
+http://item.example.com/.+.html
-http://item.example.com/[1-2000000].html
END;

$textFilterTemplate =
<<<END
{
    "contains":"QiwurInputTemplate,手机,平板,超级本",
    "containsAny":"QiwurInputTemplate,数码相机,超级本,小米手机",
    "notContains":"QiwurInputTemplate,电脑,一体机,相机",
    "containsNone":"QiwurInputTemplate,雅虎,谷歌,华为"
}
END;

$blockFilterTemplate =
<<<END
{
    "allow": [".exampleConent", "#paginate", "QiwurInputTemplate"],
    "disallow": ["#exampleComment", ".shopDetail", "QiwurInputTemplate"]
}
END;

$regexSampleExample =
<<<END
http://www.hahaertong.com/goods/2910/load_joined/page_1
http://www.hahaertong.com/goods/2911/load_joined/page_16
http://www.hahaertong.com/goods/2922/load_joined/page_8
http://www.hahaertong.com/goods/2913/load_joined/page_12
http://www.hahaertong.com/goods/2914/load_joined/page_13
http://www.hahaertong.com/goods/2915/load_joined/page_14
http://www.hahaertong.com/goods/2916/load_joined/page_9
http://www.hahaertong.com/goods/2917/load_joined/page_10
http://www.hahaertong.com/goods/2918/load_joined/page_11
END;

