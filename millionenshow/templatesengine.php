<?php
    class TemplatesEngine extends Smarty {
		function TemplatesEngine() {
			$this->template_dir = "templates";
			$this->compile_dir = "templates_c";
	        $this->config_dir = "configs";
	        $this->cache_dir = "cache";
		}
	}
?>