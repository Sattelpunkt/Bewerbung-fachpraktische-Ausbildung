<?php

require_once 'config/config.php';
require_once 'helpers/function.php';
require_once 'Core/Controller.php';
require_once 'Core/View.php';
require_once 'libs/database.php';
require_once 'libs/session.php';
if (!session_id()) @session_start();
$GLOBALS["M"] = new \Plasticbrain\FlashMessages\FlashMessages();
$GLOBALS["DB"] = new DB();

class geddon {
	
	public $DB;
	public $Session;
	protected $url;
	protected $controller = "home";
	protected $method = 'index';
	protected $params = [];

			public function __construct () {
				
				$this->getUrl();
			}

			 private function getUrl()
			{
				$this->url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];
				array_shift($this->url);
				//dnd($_SERVER);
				//dnd($this->url);
			}
			public function setController() {
					if(isset($this->url[0])){$path = ROOT. DS  . 'app' .DS. 'Controllers' .DS . $this->url[0] . 'Controller.php'; } else {$path = 0;}
					 if (file_exists($path)) {
						$this->controller = $this->url[0] . 'Controller';
						unset($this->url[0]);
						} else {
						
							$this->controller = $this->controller . 'Controller';
						}
						  require_once ROOT. DS  . 'app' . DS. 'Controllers'. DS.  $this->controller . '.php';
					
						$this->controller = new $this->controller();
						
						
			}
			 private function setMethod()	{
					if (isset($this->url[1]) && method_exists($this->controller, $this->url[1])) {
					$this->method = $this->url[1];
					unset($this->url[1]);
					}
				}
			  private function setParams()
			{
				$this->params = $this->url ? [array_values($this->url), $_POST] : [$_POST];
			}
			 public function dispatch()	{
					$this->setController();

					$this->setMethod();

				$this->setParams();

				call_user_func_array([$this->controller, $this->method], $this->params);
			}
			
}
