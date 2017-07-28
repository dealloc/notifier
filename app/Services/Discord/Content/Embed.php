<?php

namespace App\Services\Discord\Content;

final class Embed
{
    public $title = '';
    public $description = '';
    public $url = '';
    public $thumbnail = null;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Embed
     */
    public function setTitle(string $title): Embed
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Embed
     */
    public function setDescription(string $description): Embed
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Embed
     */
    public function setUrl(string $url): Embed
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param Image|null $thumbnail
     * @return Embed
     */
    public function setThumbnail(Image $thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }
}