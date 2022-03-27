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

	public function action_index(){
		$data = array();
		$this->template->title= "Home Page";
		$this->template->content= View::forge('m1/index.php', $data);
		$this->template->css= Asset::css("M1.css");
	}

	public function action_about(){
		$data = array();
		$this->template->title= "About Us Page";
		$this->template->content= View::forge('m1/about.php', $data);
		$this->template->css= Asset::css("M1.css");
	}

	public function action_colorGenerator(){
		$data = array();
		$row_col_num = "";
		$color_num = "";
		$this->template->title= "Color Coordinate Generator";
		$this->template->content= View::forge('m1/colorGenerator.php', $data);
		$this->template->css= Asset::css("M1.css");

		if (isset($_GET["num"]) && isset($_GET["colors"])) {
			$row_col_num = $_GET["num"];
			$color_num = $_GET["colors"];
			if (!is_numeric($row_col_num) || $row_col_num < 1 || $row_col_num > 26) {
				echo ("Number of Rows/Columns must be between 1 and 26");
				echo ("You entered: " . $row_col_num);
			}
			if (!is_numeric($color_num) || $color_num < 1 || $color_num > 10) {
				echo ("Number of Colors must be between 1 and 10");
				echo ("You entered: " . $color_num);
			}
		}
		


		
		$this->template->row_col_num = $row_col_num;
		$this->template->color_num = $color_num;
	}
}
