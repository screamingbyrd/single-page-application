<?php


namespace App\Event;


use Symfony\Contracts\EventDispatcher\Event;

class FilterApiResponseEvent extends Event
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return FilterApiResponseEvent
     */
    public function setData(array $data): FilterApiResponseEvent
    {
        $this->data = $data;
        return $this;
    }


}