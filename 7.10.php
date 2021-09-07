<?php
	declare( strict_types=1 );
	class CitiesParser
	{
		public const MAX_FILE_SIZE = 10485760;
		protected string $_error_message;
		protected string $_upload_file_input_name;
		protected string $_upload_file_tmpname;
		protected string $_selected_country;
		protected array $_cities;
		protected string $_filepath_cities_html;
		
		public function __construct( 
			string $upload_file_input_name, 
			string $selected_country, 
			string $filepath_cities_html) 
		{
			$this->_upload_file_input_name = $upload_file_input_name;
			$this->_selected_country = $selected_country;
			$this->_filepath_cities_html = $filepath_cities_html;
		}

		protected function _initialize() {
			return $this;
		}

		protected function processUploadedFile()
		 {
			if( empty( $_FILES[$this->_upload_file_input_name ] ) ) {
			throw new Exception( 'Помилка. Необхідно завантажити файл.');
			}
		
			if( $_FILES[$this->_upload_file_input_name ]['error'] !== UPLOAD_ERR_OK ) {
			throw new Exception( 'Сталася помилка під час завантаження файлу.');
			}
		
			$valid_mimetypes = [ 'text/csv' ];
			if( !in_array( $_FILES[$this->_upload_file_input_name ]['type'], $valid_mimetypes ) ) {
			throw new Exception( 'Помилка. Файл повинен мати формат CSV');
			}
			
			if( $_FILES[$this->_upload_file_input_name ]['size'] >CitiesParser::MAX_FILE_SIZE ) {
				throw new Exception( "Помилка. Файл повинен бути менше CitiesParser::MAX_FILE_SIZE байт.");
				return false;
			}
			return $this;
		 }

		protected function _getCitiesFromCSVFile() {
			return $this;
		}

		protected function _sortCitiesByName() {
			return $this;
		}

		protected function _createCitiesHTMLFile() {
			return $this;
		}

		protected function _redirectLocation() {
			return $this;
		}

		public function execute() : void
		{
			try
			{
				$this->_initialize();
				$this->_processUploadedFile();
				$this->_getCitiesFromCSVFile();
				$this->_sortCitiesByName();
				$this->_createCitiesHTMLFile();
				$this->_redirectLocation();
			}
			catch( Exception $e )
			{
			$this->_error_message = $e->getMessage();
			}
		}
		// (продовження)
		public function getError() : string
		{
		return $this->_error_message;
		}
	}

	$citiesParser = new CitiesParser(
		'userfile', // значення атрибута "name"
		'Ukraine', // значення країни для парсингу
		'./data/cities_ukraine.html' // результуючий HTML-файл
		);
	$citiesParser->execute();
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
  </head>
  <body>
    <form enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
    Файл: <input name="userfile" type="file" />
    <button type="submit">Надіслати</button>
    </form>
  </body>
</html>