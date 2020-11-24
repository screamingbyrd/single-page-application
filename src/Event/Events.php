<?php


namespace App\Event;


final class Events
{
    /**
     * Called directly before the get user API data is returned.
     *
     * Listeners have the opportunity to change that data.
     *
     * @Event("App\Event\FilterApiResponseEvent")
     */
    const FILTER_API_GET_USERS = 'filter_api_get_users';
}