<?php

namespace App\Enums;

enum BlockType: string
{
    case TITLE = 'title';
    case SUBTITLE = 'subtitle';
    case IMAGE = 'image';
    case LIST = 'list';
    case CARD = 'card';
}