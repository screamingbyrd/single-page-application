<?php


namespace App\EventSubscriber;


use App\Event\Events;
use App\Event\FilterApiResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddUserToApiubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            Events::FILTER_API_GET_USERS => 'onFilterApi',
        ];
    }

    public function onFilterApi(FilterApiResponseEvent $event)
    {
        $data = $event->getData();
        $data[] = array('id' => 3, 'name' => 'Added with event', 'imageURL' => 'https://randomuser.me/api/portraits/men/47.jpg', 'description' => 'test');
        $event->setData($data);
    }
}