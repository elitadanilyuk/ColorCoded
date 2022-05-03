<?php

/**
*RETRIEVED from home.php
*/
class Controller_cc extends Controller_Template
{	

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */

	/*public $template = 'template_admin';*/

	public function action_index() {
		$data = array();
		$this->template->title= "Welcome to ColorCoded!";
		$this->template->content= View::forge('m1/index.php', $data);
		$this->template->css= Asset::css("M1.css");
	}

	public function action_about() {
		$data = array();
		$this->template->title= "About the ColorCoded Team";
		$this->template->content= View::forge('m1/about.php', $data);
		$this->template->css= Asset::css("M1.css");
	}

	public function action_colorGenerator() {
		$data = array();
		$row_col_num = "";
		$color_num = "";
		$submit = "";
		$this->template->title= "Color Coordinate Generator";
		$this->template->content= View::forge('m1/colorGenerator.php', $data);
		$this->template->css= Asset::css("M1.css");

		if (isset($_GET["num"]) && isset($_GET["colors"]) && isset($_GET["submit"])) {
			$row_col_num = 0;
			$color_num = 0;
			$submit = 0;
			if (!is_numeric($_GET["num"]) || $_GET["num"] < 1 || $_GET["num"] > 26) {

				echo '<script>alert("Number of Rows/Columns must be between 1 and 26!")</script>';
				
				$_GET['num'] = 0;
				$_GET['num'] = 0;
				$_GET['colors'] = 0;
				$_GET['colors'] = 0;
			}
			else if (!is_numeric($_GET["colors"]) || $_GET["colors"] < 1 || $_GET["colors"] > 10) {

				echo '<script>alert("Number of Colors must be between 1 and 10!")</script>';

				$_GET['colors'] = 0;
				$_GET['colors'] = 0;
				$_GET['num'] = 0;
				$_GET['num'] = 0;
			}
			else {
				$this->template->row_col_num = $_GET["num"];
				$this->template->color_num = $_GET["colors"];
				$this->template->submit = $_GET["submit"];
				return new Response(View::forge('m1/print.php', $data));
			}
		}
	}
	
	public function action_print() {
		$submit = "";
		$data['title'] = "Printable View";
		$data['content'] = "Generated Tables";

		return new Response(View::forge('m1/print.php', $data));
	}
}
