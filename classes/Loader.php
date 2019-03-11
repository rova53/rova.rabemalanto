<?php
class Loader {
	private $controller;
	private $action;
	private $urlvalues;
	
	//store the URL values on object creation
	public function __construct($urlvalues) {
		$this->urlvalues = $urlvalues;
		if (!array_key_exists('controller', $this->urlvalues)) {
			$this->controller = "home";
		} else {
			$this->controller = $this->urlvalues['controller'];
		}
		if (!array_key_exists('action', $this->urlvalues)) {
			$this->action = "index";
		} else {
			$this->action = $this->urlvalues['action'];
		}
	}
	
	public function CreateController() {
		if (class_exists($this->controller)) {
			$parents = class_parents($this->controller);
			if (in_array("BaseController",$parents)) {
				if (method_exists($this->controller,$this->action)) {
					return new $this->controller($this->action,$this->urlvalues);
				} else {
//					return new Error("badUrl",$this->urlvalues);
				}
			} else {
//				return new Error("badUrl",$this->urlvalues);
			}
		} else {
//			return new Error("badUrl",$this->urlvalues);
		}
	}
}

