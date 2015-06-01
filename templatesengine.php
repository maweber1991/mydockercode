<?php
/*
   * Millionenshow - TemplatesEngine - Config
   * 2015, Weber Manuel
   *
   *  This program is free software: you can redistribute it and/or modify
   *  it under the terms of the GNU General Public License as published by
   *  the Free Software Foundation, either version 3 of the License, or
   *  (at your option) any later version.
   *
   *  This program is distributed in the hope that it will be useful,
   *  but WITHOUT ANY WARRANTY; without even the implied warranty of
   *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   *  GNU General Public License for more details.
   *
   *  You should have received a copy of the GNU General Public License
   *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
   * 
*/

    class TemplatesEngine extends Smarty {
		function TemplatesEngine() {
			$this->template_dir = "templates";
			$this->compile_dir = "templates_c";
	        $this->config_dir = "configs";
	        $this->cache_dir = "cache";
		}
	}
?>