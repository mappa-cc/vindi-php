<?php

namespace Vindi;

use Vindi\Exceptions\WebhookHandleException;

class WebhookHandler
{
    /**
     * @var string
     */
    public $file = 'php://input';

    /**
     * @return mixed
     * @throws \Vindi\Exceptions\WebhookHandleException
     */
    public function handle()
    {
        try {
            if (! $body = $this->getRawBody()) {
                throw new \Exception('Empty post body!');
            }

            if (! $decoded = json_decode($body)) {
                throw new \Exception('Unable to decode JSON from post body!');
            }

            $att = get_object_vars($decoded);
            $att = array_keys($att)[0];
            $event = $decoded->{$att};

            // reset($decoded);
            // $event = current($decoded); // get first attribute from array, e.g.: event.

            return $event;
        } catch (\Exception $e) {
            throw new WebhookHandleException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @return string
     */
    public function getRawBody()
    {
        return file_get_contents($this->file);
    }
}
