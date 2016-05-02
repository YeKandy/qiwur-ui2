<?php 
	use Cake\Utility\Inflector;

	// common javascript
	echo $this->Html->script(JQUERY);
	echo $this->Html->script(JQUERY_UI);
	echo $this->Html->script(JSRENDER);
	echo $this->Html->script(COMMON);
	echo $this->Html->script(LAYER);
	echo $this->Html->script(DUMP);

	$controller = Inflector::delimit($this->request->params["controller"]);
	$action = $this->request->params["action"];

	// model specified css
	if (is_file(WWW_ROOT.DS."js".DS.$controller.DS.$controller.".js")) {
		echo $this->Html->script($controller."/".$controller);
	}

	// action specified css
	if (is_file(WWW_ROOT.DS."js".DS.$controller.DS.$action.".js")) {
		echo $this->Html->script($controller."/".$action);
	}

	// static pages
	if ('pages' === $controller && isset($this->viewVars['page'])
			&& is_file(WWW_ROOT.DS."js".DS.$controller.DS.$this->viewVars['page'].".js")) {
				echo $this->Html->script('pages/'.$this->viewVars['page']);
	}

	if (isset($scripts_for_layout)) {
		echo $scripts_for_layout;
	}

	// echo $js->writeBuffer();
