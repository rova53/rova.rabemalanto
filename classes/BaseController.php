<?php
/**
 * Description of BaseController
 *
 * @author rova
 */

abstract class BaseController {
	protected $urlvalues;
	protected $action;
	protected $template;
        protected $baseUrl ;
        protected $class;
        protected $cssDirectory;
        protected $jsDirectory;
        
	public function __construct($action, $urlvalues , $template = '') {
		$this->action = $action;
		$this->urlvalues = $urlvalues;
                $this->template = 'templates/template.php';
                $this->baseUrl = "http://".$_SERVER['SERVER_NAME'].'/test/';
                $this->cssDirectory = "assets/css/";
                $this->jsDirectory = "assets/script/";
	}
	
        public function setTemplate($template){
            $this->template = $template;
        }
        
	public function ExecuteAction() {
		return $this->{$this->action}();
	}
        
        public function getBaseUrl(){
            return $this->baseUrl;
        }


        public function getUrl($action){
            if(isset($this->class)){
                return $this->getBaseUrl().$this->class.'/'.$action;
            }
            return '';
        }
	
        public function renderTemplateFromController(array $url){
            $this->action = $url[1];
            $this->$url[1]();
        }
        
        public function renderCss(){
            $listFile = scandir($this->cssDirectory);
            foreach ($listFile as $file){
                echo '<link href="'.$this->getBaseUrl().'assets/css/'.$file.'" rel="stylesheet">';
            }
        }
        public function renderJs(){
            $listFile = scandir($this->jsDirectory);
            foreach ($listFile as $file){
                echo '<script src="'.$this->getBaseUrl().'assets/script/'.$file.'"></script>';
            }
        }
        
	protected function ReturnView(array $viewmodel, $fullview = false) {
            $this->class = get_class($this);
            extract($viewmodel);
		$viewloc = 'views/' . get_class($this) . '/' . $this->action . '.php';
                $titre = isset($titre) ? $titre : $this->action ;
                require_once($this->template);
                require_once($viewloc);
	}
    
}

