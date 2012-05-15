<?php
class Helper_AclLink extends Zend_View_Helper_Abstract
{
	public function aclLink($label, $actionName, $controllerName, $moduleName = "admin", $enableAcl = true)
	{
		if($enableAcl) {
			$acl = Class_Acl::getInstance();
			$adminSession = Class_Session_Admin::getInstance();
			$roleId = $adminSession->getRoleId();
			
			if($acl->isAllowed($roleId, $controllerName)) {
				return "<li><a href='/".$moduleName."/".$controllerName."/".$actionName."'>".$label."</a></li>";
			} else {
				return "";
			}
		} else {
			return "<li><a href='/".$moduleName."/".$controllerName."/".$actionName."'>".$label."</a></li>";
		}
	}
}