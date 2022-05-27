<?php

namespace Webvovan\RockCms\Helpers;

class MenuHelper
{
    public static function getMenu(): array
    {
        return config('rock-cms-menu.menu');
    }
}
