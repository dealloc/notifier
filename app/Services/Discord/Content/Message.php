<?php

namespace App\Services\Discord\Content;

final class Message
{
    public $embeds = [];

    public $content = null;

    public $username = null;

    public $tts = false;

    /**
     * @return array
     */
    public function getEmbeds(): array
    {
        return $this->embeds;
    }

    /**
     * @param Embed[] $embeds
     * @return Message
     */
    public function setEmbeds(Embed... $embeds): Message
    {
        $this->embeds = $embeds;
        return $this;
    }

    /**
     * @param Embed $embed
     * @return Message
     */
    public function addEmbed(Embed $embed): Message
    {
        $this->embeds[] = $embed;
        return $this;
    }

    /**
     * @param null $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param null $username
     * @return Message
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTts(): bool
    {
        return $this->tts;
    }

    /**
     * @param bool $tts
     * @return Message
     */
    public function setTts(bool $tts): Message
    {
        $this->tts = $tts;
        return $this;
    }
}