<?php

return [
    'pages' => [
        '__home__' => [
            'title' => 'Home',
            'preprocessor' => \App\Preprocessor\HomepagePreprocessor::class,
        ],
        'finansial' => [
            'title' => 'Finansial',
        ],
        'article' => [
            'title' => 'Article',
            'preprocessor' => \App\Preprocessor\ArticlePreprocessor::class,
        ],
    ],
    'blocks' => [
    ],
    'images' => [
    ],

];
