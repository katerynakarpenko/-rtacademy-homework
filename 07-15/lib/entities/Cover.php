<?php
	declare( strict_types=1 );
	namespace lib\entities;

	class Cover {
		protected string $_filename;
		protected string $_alt;

		public function __construct(string $filename, string $alt = '') {
			$this->_filename = $filename;
			$this->_alt = $alt;
		}
		public function getListImgAttributes(): array {
			return [
				'src' => './img/'.$this->_filename.'.jpg',
				'srcset' => './img'.$this->_filename.'.jpg 310w, ./img/'.$this->_filename.'.jpg 350w',
				'alt' => htmlspecialchars($this->_alt),
			];
			
		}
		public function getSingleImgAttributes() :array {
			return [
				'src' => './img'.$this->filename.'_1200.jpg',
				'alt' => htmlspecialchars($this->_alt),
			];
		}
		public function getImgTag( array $attributes ): string {
			$img_tag = '<img ';
			foreach ($attributes as $key => $value) {
				$img_tag .= $key .'="'.$value.'"';
			}
			$img_tag .= '/>';

			return $img_tag;
		}
	
	}
?>