<?php

namespace Webvovan\RockCms\Helpers;

class MenuHelper
{
    public static function getMenu(): array
    {
        return [
            ['header' => 'РАЗДЕЛЫ САЙТА'],
            [
                'text' => 'Главная',
                'icon' => 'fas fa-fw fa-home',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.main',
                    ],
                ],
            ],
            [
                'text' => 'О компании',
                'icon' => 'fas fa-fw fa-fire',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.about',
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Исторические события',
                        'route' => 'timelines.list',
                        'active' => ['admin/timelines/*']
                    ],
                ],
            ],
            [
                'text' => 'Наша команда',
                'icon' => 'fas fa-fw fa-users-cog',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.team',
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Люди',
                        'route' => 'people.list',
                        'active' => ['admin/people/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Отделы',
                        'route' => 'departments.list',
                        'active' => ['admin/departments/*']
                    ],
                ],
            ],
            [
                'text' => 'О работе с нами',
                'icon' => 'fas fa-fw fa-cog',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.work',
                    ],
                ],
            ],
            [
                'text' => 'Проекты',
                'icon' => 'fas fa-fw fa-project-diagram',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Проекты',
                        'route' => 'projects.list',
                        'active' => ['admin/projects/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Категории',
                        'route' => 'projects.categories.list',
                        'active' => ['admin/project-categories/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.projects',
                    ],
                ],
            ],
            [
                'text' => 'Новости',
                'icon' => 'far fa-fw fa-file',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.news',
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Список новостей',
                        'route' => 'news.list',
                        'active' => ['admin/news/*']
                    ],
                ],
            ],
            [
                'text' => 'Вакансии',
                'icon' => 'far fa-fw fa-user',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Список вакансий',
                        'route' => 'jobs.list',
                        'active' => ['admin/jobs/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.jobs',
                    ],
                ],
            ],
            [
                'text' => 'Услуги',
                'icon' => 'far fa-fw fa-life-ring',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Список услуг',
                        'route' => 'services.list',
                        'active' => ['admin/services/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.services',
                    ],
                ],
            ],
            [
                'text' => 'Продукты',
                'icon' => 'fas fa-fw fa-wallet',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.products',
                    ],
                ],
            ],
            [
                'text' => 'Награды и рейтинги',
                'icon' => 'fas fa-fw fa-trophy',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Список наград',
                        'route' => 'rewards.list',
                        'active' => ['admin/rewards/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Категории',
                        'route' => 'rewards.categories.list',
                        'active' => ['admin/rewards-categories/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.rewards',
                    ],
                ],
            ],
            [
                'text' => 'Головной офис',
                'icon' => 'far fa-fw fa-building',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройка страницы',
                        'route' => 'pages.office',
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Офисные зоны',
                        'route' => 'office.zones.list',
                        'active' => ['admin/office-zones/*']
                    ],
                ],
            ],
            [
                'text' => 'Контакты',
                'icon' => 'fas fa-fw fa-map-marker-alt',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройки страницы',
                        'route' => 'pages.contacts',
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Офисы',
                        'route' => 'offices.list',
                        'active' => ['admin/offices/*']
                    ],
                ],
            ],
            [
                'text' => 'Сертификаты и лицензии',
                'icon' => 'fas fa-fw fa-certificate',
                'submenu' => [
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Настройки страницы',
                        'route' => 'pages.certificates',
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Сертификаты',
                        'route' => 'certificates.list',
                        'active' => ['admin/certificates/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Лицензии',
                        'route' => 'licenses.list',
                        'active' => ['admin/licenses/*']
                    ],
                    [
                        'icon' => '',
                        'shift' => 'ml-4',
                        'text' => 'Рекомендательные письма',
                        'route' => 'recommendations.list',
                        'active' => ['admin/recommendations/*']
                    ],
                ],
            ],
            [
                'text' => 'Теги',
                'route' => 'tags.list',
                'icon' => 'fas fa-fw fa-tags',
                'active' => ['admin/tags/*']
            ],
        ];
    }
}
