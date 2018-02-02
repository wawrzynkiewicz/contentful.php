<?php

namespace Contentful\Asset;


class Fields
{
    private $title;
    private $file;

    /**
     * Fields constructor.
     * @param $title
     * @param $file
     */
    public function __construct($title, $file)
    {
        $this->title = $title;
        $this->file = $file;
    }

    public function getAsJson()
    {
        return json_encode([
            'fields' => [
                'title' => $this->title,
                'file' => $this->file
            ]
        ]);
    }
}