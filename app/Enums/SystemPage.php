<?php

namespace App\Enums;

enum SystemPage: string
{
    case HOME = 'home';
    case ARTICLES = 'articles';
    case TAGS = 'tags';

    case SEARCH = 'search';
    case ERROR404 = '404';
}
