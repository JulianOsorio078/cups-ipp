<?php

namespace Smalot\Cups\Model;

/**
 * Class Job
 *
 * @package Smalot\Cups\Model
 */
class Job implements JobInterface
{

    const CONTENT_FILE = 'file';

    const CONTENT_TEXT = 'text';

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string
     */
    protected $printerUri;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $pageRanges;

    /**
     * @var int
     */
    protected $copies;

    /**
     * @var int
     */
    protected $sides;

    /**
     * @var int
     */
    protected $fidelity;

    /**
     * @var array
     */
    protected $content = [];

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $stateReason;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Job
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     *
     * @return Job
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrinterUri()
    {
        return $this->printerUri;
    }

    /**
     * @param string $printerUri
     *
     * @return Job
     */
    public function setPrinterUri($printerUri)
    {
        $this->printerUri = $printerUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Job
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return Job
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPageRanges()
    {
        return $this->pageRanges;
    }

    /**
     * @param string $pageRanges
     *
     * @return Job
     */
    public function setPageRanges($pageRanges)
    {
        $this->pageRanges = $pageRanges;

        return $this;
    }

    /**
     * @return int
     */
    public function getCopies()
    {
        return $this->copies;
    }

    /**
     * @param int $copies
     *
     * @return Job
     */
    public function setCopies($copies)
    {
        $this->copies = $copies;

        return $this;
    }

    /**
     * @return int
     */
    public function getSides()
    {
        return $this->sides;
    }

    /**
     * @param int $sides
     *
     * @return Job
     */
    public function setSides($sides)
    {
        $this->sides = $sides;

        return $this;
    }

    /**
     * @return int
     */
    public function getFidelity()
    {
        return $this->fidelity;
    }

    /**
     * @param int $fidelity
     *
     * @return Job
     */
    public function setFidelity($fidelity)
    {
        $this->fidelity = $fidelity;

        return $this;
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $filename
     * @param string $mimetype
     * @param string $name
     *
     * @return Job
     */
    public function addFile($filename, $mimetype = 'application/octet-stream', $name = '')
    {
        $this->content[] = [
          'type' => self::CONTENT_FILE,
          'filename' => $filename,
          'mimetype' => $mimetype,
          'name' => $name,
        ];

        return $this;
    }

    /**
     * @param string $text
     * @param string $name
     *
     * @return Job
     */
    public function addText($text, $name = '')
    {
        $this->content[] = [
          'type' => self::CONTENT_TEXT,
          'text' => $text,
          'name' => $name,
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     *
     * @return Job
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     *
     * @return Job
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getStateReason()
    {
        return $this->stateReason;
    }

    /**
     * @param string $stateReason
     *
     * @return Job
     */
    public function setStateReason($stateReason)
    {
        $this->stateReason = $stateReason;

        return $this;
    }
}