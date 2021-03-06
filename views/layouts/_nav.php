<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandOptions' => ['style' => 'color: #9d9d9d;'],
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
    ['label' => Yii::t('app', 'Questions'), 'url' => ['/question/question/index']],
    ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
    ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItems,
]);
$menuItems = [
    [
        'label' => Yii::t('app', 'GitHub'),
        'url' => 'https://github.com/yuncms/yuncms-app-basic',
        'linkOptions' => [
            'rel' => 'nofollow',
            'target' => '_blank'
        ]
    ]
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'Sign In'), 'url' => ['/user/registration/register']];
    $menuItems[] = ['label' => Yii::t('app', 'Sign Up'), 'url' => ['/user/security/login']];
} else {
    $menuItems[] = [
        'label' => '<i class="fa fa-bell-o fa-lg"></i>',
        'url' => ['/user/notification/index'],
        'options' => ['class' => 'navico-li'],
        'linkOptions' => ['id' => 'unread_notifications'],
        'encode' => false
    ];
    if (Yii::$app->hasModule('message')) {
        $menuItems[] = [
            'label' => '<i class="fa fa-envelope-o fa-lg"></i>',
            'url' => ['/message/message/index'],
            'options' => ['class' => 'navico-li'],
            'linkOptions' => ['id' => 'unread_messages'],
            'encode' => false
        ];
    }
    $menuItems[] = [
        'label' => Html::img(Yii::$app->user->identity->getAvatar('small'), ['class' => 'avatar-32 mr-5', 'alt' => Yii::$app->user->identity->name,]) . Yii::$app->user->identity->name,
        'encode' => false,
        'options' => ['class' => 'user-avatar'],
        'items' => [
            ['label' => Html::tag('span', '', ['class' => 'fa fa-home']) . Yii::t('user', 'My Page'), 'url' => ['/user/space/index'], 'encode' => false],
            '<li class="divider"></li>',
            ['label' => Html::tag('span', '', ['class' => 'fa fa-money']) . Yii::t('user', 'My Coin'), 'url' => ['/user/coin/index'], 'encode' => false],
            ['label' => Html::tag('span', '', ['class' => 'fa fa-gift']) . Yii::t('user', 'My Credit'), 'url' => ['/user/credit/index'], 'encode' => false],
            ['label' => Html::tag('span', '', ['class' => 'fa fa-cog']) . Yii::t('user', 'Profile Setting'), 'url' => ['/user/setting/profile'], 'encode' => false],
            ['label' => Html::tag('span', '', ['class' => 'fa fa-cog']) . Yii::t('user', 'Security Setting'), 'url' => ['/user/setting/account'], 'encode' => false],
            '<li class="divider"></li>',
            ['label' => Html::tag('span', '', ['class' => 'fa fa-sign-out']) . Yii::t('user', 'Logout'), 'url' => ['/user/security/logout'], 'encode' => false,
                'linkOptions' => ['data-method' => 'post']
            ],
        ]
    ];
}

$menuItems[] = [
    'label' => Yii::t('app', 'Language'),
    'items' => [
        ['label' => Yii::t('app', '简体中文'), 'url' => Url::current(['language' => 'zh-CN'])],
        ['label' => Yii::t('app', 'English (US)'), 'url' => Url::current(['language' => 'en-US'])],
    ], 'options' => ['class' => 'lang-li']
];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav user-menu navbar-right'],
    'activateParents' => true,
    'items' => $menuItems,
]);
NavBar::end();
?>