<?php
namespace Brick\Helper\Twig;

class Filter
{
	public static $serviceManager;

	public static function setServiceManager($sm)
	{
		self::$serviceManager = $sm;
	}
	
	public static function substr($str, $start, $length, $charset = "utf-8", $suffix = true)
	{
		if(function_exists("mb_substr")){
			if(mb_strlen($str, $charset) <= $length)
				return $str;
			$slice = mb_substr($str, $start, $length, $charset);
		} else {
			$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
			$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
			$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
			$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
			preg_match_all($re[$charset], $str, $match);
			if(count($match[0]) <= $length)
				return $str;
			$slice = join("",array_slice($match[0], $start, $length));
		}
		if($suffix)
			return $slice."..";
		return $slice;
	}
	
	public static function url($docArr, $routeType)
	{
		$router = self::$serviceManager->get('Router');
		$routeName = 'application/'.$routeType;
		
		if(isset($docArr['alias']) && !empty($docArr['alias'])) {
			$resourceId = $docArr['alias'];
		} else {
			$resourceId = $docArr['id'];
		}
		return $router->assemble(array('id' => $resourceId, 'page' => 1), array('name' => $routeName));
	}
	
	public static function pageLink($pageNumber, $routeType, $routeMatchParams, $getQueryParams = array())
	{
		$router = self::$serviceManager->get('Router');
		
		if($routeType == 'application/search') {
			$getQueryParams['page'] = "page=".$pageNumber;
			$getQueryStr = implode('&', $getQueryParams);
			return "/search.shtml?".$getQueryStr;
		} else {
			$params = array_merge($routeMatchParams, array('page' => $pageNumber));
			return $router->assemble($params, array('name' => $routeType));
		}
	}
	
	static function outputImage($url, $type = 'main')
	{
		$siteConfig = self::$serviceManager->get('ConfigObject\EnvironmentConfig');
		if($type == 'main') {
			return $siteConfig->fileFolderUrl.'/'.$url;
		} else {
			return $siteConfig->fileFolderUrl.'/_resize/'.$url;
		}
	}
	
	static function translate($text)
	{
		$translator = self::$serviceManager->get('translator');
		return $translator->translate($text);
	}
	
	static function graphicDataJson($attachments)
	{
		if(is_array($attachments)) {
			$dataArr = array();
			foreach($attachments as $attr) {
				if($attr['filetype'] == 'graphic') {
					$dataArr[] = '"'.$attr['urlname'].'"';
				}
			}
			if(count($dataArr) == 0) {
				return "";
			}
			$dataStr = '"items": [';
			$dataStr .= implode(',', $dataArr);
			$dataStr .= ']';
			return $dataStr;
		} else {
			return "";
		}
	}
}