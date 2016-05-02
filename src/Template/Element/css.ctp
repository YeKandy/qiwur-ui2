<?php 
	use Cake\Utility\Inflector;

	echo $this->Html->css($css);

	$controller = Inflector::delimit($this->request->params["controller"]);
	$action = $this->request->params["action"];

	// model specified css
	if (is_file(WWW_ROOT.DS."css".DS.$controller.DS.$controller.".css")) {
       echo $this->Html->css($controller."/".$controller);
	}

	// action specified css
	if (is_file(WWW_ROOT.DS."css".DS.$controller.DS.$action.".css")) {
       echo $this->Html->css($controller."/".$action);
	}

	// static pages
	if ('pages' === $controller && isset($this->viewVars['page'])
		&& is_file(WWW_ROOT.DS."css".DS.$controller.DS.$this->viewVars['page'].".css")) {
       echo $this->Html->css('pages/'.$this->viewVars['page']);
	}

	// other css
	if (isset($css_for_layout)) {
		echo $css_for_layout;
	}
