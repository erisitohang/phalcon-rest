<?php
namespace App\Middlewares;

use Phalcon\Events\Event;
use Phalcon\Http\Response;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

/**
 * NotFoundMiddleware
 *
 * @property Response $response
 */
class NotFoundMiddleware implements MiddlewareInterface
{
    /**
     * @param Event $event
     * @param Micro $application
     *
     * @returns bool
     */
    public function beforeNotFound(Event $event, Micro $application)
    {
        $payload = [
            'code'    => 404,
            'status'  => 'error',
            'message' => 'Not Found',
        ];

        $application
            ->response
            ->setStatusCode(404, 'Not Found')
            ->setJsonContent($payload)
            ->send()
        ;

        return false;
    }

    /**
     * @param Micro $application
     *
     * @returns bool
     */
    public function call(Micro $application)
    {
        return true;
    }
}
