<?php
    declare( strict_types=1 );
    namespace lib\entities;
    
    interface ItemInterface {
        public function getId():int;
        public function setId(int $id) :void;
        public function getTitle ():string;
        public function setTitle ( string $title ):void;
        public function getAlias ():string;
        public function setAlias ( string $alias ):void;
        public function getDescription ():string;
        public function setDescription ( string $description ):void;
        public function getAuthor ():Author;
        public function setAuthor ( Author $author ):void;
        public function getPublishDate (string $format):string;
        public function setPublishDate ( string $publishDate ):void;
        public function getCategory ():Category;
        public function setCategory ( Category $category ):void;
        public function getCover ():Cover;
        public function setCover ( Cover $cover ):void;
        public function getUrl ():string;


    }
?>