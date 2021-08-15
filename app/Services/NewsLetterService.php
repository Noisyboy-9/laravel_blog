<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class NewsLetterService
{
    private string $listId;
    private ApiClient $client;

    public function __construct()
    {
        $this->listId = config('services.mailchimp.id');
        $this->client = new ApiClient();

        $this->client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }

    public function subscribe($email)
    {
        return $this->client->lists->addListMember($this->listId, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function unsubscribe()
    {
    }
}
