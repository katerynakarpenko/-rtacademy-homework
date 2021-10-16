<?php

declare( strict_types=1 );

namespace lib\entities;

class PostCover
{
    protected int    $_id;
    protected string $_filename;
    protected string $_alt;

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId( int $id ): void
    {
        $this->_id = $id;
    }

    public function getFilename(): string
    {
        return $this->_filename;
    }

    public function setFilename( string $filename ): void
    {
        $this->_filename = $filename;
    }

    public function getAlt(): string
    {
        return $this->_alt;
    }

    public function setAlt( string $alt ): void
    {
        $this->_alt = $alt;
    }

    public function getListImgAttributes(): array
    {
        return
        [
            'src'    => './img/' . $this->_filename . '.jpg',
            'srcset' => './img/' . $this->_filename . '.jpg 310w, ./img/' . $this->_filename . '.jpg 350w, ./img/' . $this->_filename . '.jpg 550w, ./img/' . $this->_filename . '.jpg 640w',
            'alt'    => htmlspecialchars( $this->_alt ),
        ];
    }

    public function getSingleImgAttributes(): array
    {
        return
        [
            'src'   => './img/' . $this->_filename . '.jpg',
            'alt'    => htmlspecialchars( $this->_alt ),
        ];
    }

    public function getImgTag( array $attrs ): string
    {
        $img_tag = '<img ';

        foreach( $attrs as $key => $value )
        {
            $img_tag .= $key . '="' . $value . '" ';
        }

        $img_tag .= '/>';

        return $img_tag;
    }
}