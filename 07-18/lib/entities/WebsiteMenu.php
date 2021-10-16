<?php
	declare( strict_types=1 );
	
	namespace lib\entities;

	class WebsiteMenu {
		protected int $_id;
		protected string $_title;
		protected string $_href;

		public function getId(): int {
			return $this->_id;
		}

		public function setId( int $id){
			$this->_id = $id;
		}
		public function getTitle() :string {
			return $this->_title;
		}
		public function setTitle( string $title) {
			$this->_title = $title;
		}
		public function getHref(): string {
			return $this->_href;
		}
		public function setHref(string $href) {
			$this->_href = $href;
		}
	
	}
?>