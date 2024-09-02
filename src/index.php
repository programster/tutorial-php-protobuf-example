<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/GPBMetadata/MyApplication.php');
require_once(__DIR__ . '/Types/User.php');
require_once(__DIR__ . '/Types/UserList.php');

$app = Slim\Factory\AppFactory::create();
$app->addErrorMiddleware($displayErrorDetails=true, $logErrors=true, $logErrorDetails=true);

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {

    // Create a user.
    $user1 = new \Types\User();
    $user1->setId(1);
    $user1->setName("User1");
    $user1->setEmail("user.1@programster.org");

    // Create a second user.
    $user2 = new \Types\User();
    $user2->setId(2);
    $user2->setName("User2");
    $user2->setEmail("user.2@programster.org");

    // Create the list of users that form our UserList response message.
    $users = [$user1, $user2];
    $userList = new \Types\UserList();
    $userList->setUsers($users);

    if (true)
    {
        // output in the binary protobuf form for efficiency.
        $responseBody = $userList->serializeToString();
    }
    else
    {
        // Alternatively, you can flip the switch to output as normal JSON.
        $responseBody = $userList->serializeToJsonString();
    }

    $response->getBody()->write($responseBody);
    return $response;
});

$app->run();
