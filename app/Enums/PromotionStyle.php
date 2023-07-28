<?php

namespace App\Enums;

use App\Traits\WithDisplayName;

enum StyleType: string
{
    use WithDisplayName;

    case style1 = 'Sports Entertainment';
    case style2 = 'Pure Wrestling';
    case style3 = 'Traditional';
    case style4 = 'Hardcore';
    case style5 = 'Comedy';
    case style6 = 'Strong Style';
    case style7 = 'Lucha Libre';
    case style8 = 'Deathmatch';
    case style9 = 'Technical';
    case style10 = 'Shoot';
    case style11 = 'High Flying';
    case style12 = 'Powerhouse';
    case style13 = 'Brawler';
}
