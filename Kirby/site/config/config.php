<?php

return [
    'api' => [
        'routes' => [
            [
                'pattern' => 'my-endpoint',
                'action'  => function () {
                    return [
                        'hello' => 'world'
                    ];
                }
            ]
        ]
    ]
];

return [
    'debug'  => true
];

/*
c::set('rauth.twitter.key', 'TwitterClientID');
c::set('rauth.twitter.secret', 'TwitterClientSecret');
c::set('rauth.twitter.callback', 'YOURKIRBYURL/auth/auth:twitter');

c::set('rauth.github.key', 'GitHubClientID');
c::set('rauth.github.secret', 'GitHubClientSecret');
c::set('rauth.github.callback', 'YOURKIRBYURL/auth/auth:github');
*/