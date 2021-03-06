# TreeView Menu widget for Yii2 Framework
<http://yii2.kadastrcard.ru/dtree>

The extension uses dTree 2.05 and makes treeview menu from php array of structure defined.

[DtreeMenu PHP Array generator](http://yii2.kadastrcard.ru/dynatreemenu).

![Dtree Menu](http://yii2.kadastrcard.ru/uploads/dtreemenu.png)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run:

```bash
composer require slavkovrn/yii2-dtreemenu
```

or add

```bash
"slavkovrn/yii2-dtreemenu": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Set link to extension in your view:

```php
<?php

use slavkovrn\dtreemenu\DtreeMenuWidget;

$tree=[
    0 => [
            'name' => 'Menu0 name',
            'description' => 'Tool tip description for Menu0',
            'href' => '/link_when_DblClicked.html',
            'children' => [
                1 => [
                        'name' => 'SubMenu1 name',
                        'description' => 'Tool tip description for SubMenu1',
                        'href' => '/link_when_DblClicked.html',
                        'children' => [
                            2 => [
                                    'name' => 'SubSubMenu2 name',
                                    'description' => 'Tool tip description for SubSubMenu2',
                                    'href' => '/link_when_DblClicked.html',
                                    'children' => [
                                         3 => [
                                                'name' => 'SubSubSubMenu3 name',
                                                'description' => 'Tool tip description for SubSubSubMenu3',
                                                'href' => '/link_when_DblClicked.html',
                                            ],
                                        4 => [
                                                'name' => 'SubSubSubMenu4 name',
                                                'description' => 'Tool tip description for SubSubSubMenu4',
                                                'href' => '/link_when_DblClicked.html',
                                            ],
                                   ]
                                ],
                            5 => [
                                    'name' => 'SubSubMenu5 name',
                                    'description' => 'Tool tip description for SubSubMenu5',
                                    'href' => '/link_when_DblClicked.html',
                                ],
                            6 => [
                                    'name' => 'SubSubMenu6 name',
                                    'description' => 'Tool tip description for SubSubMenu6',
                                    'href' => '/link_when_DblClicked.html',
                                ],
                        ]
                    ],
                7 => [
                        'name' => 'SubMenu7 name',
                        'description' => 'Tool tip description for SubMenu7',
                        'href' => '/link_when_DblClicked.html',
                    ],
                8 => [
                        'name' => 'SubMenu8 name',
                        'description' => 'Tool tip description for SubMenu8',
                        'href' => '/link_when_DblClicked.html',
                    ],
           ]
        ],
    9 => [
            'name' => 'Menu9 name',
            'description' => 'Tool tip description for Menu9',
            'href' => '/link_when_DblClicked.html',
        ],
    10 => [
            'name' => 'Menu10 name',
            'description' => 'Tool tip description for Menu10',
            'href' => '/link_when_DblClicked.html',
        ],
];
?>

<?= DtreeMenuWidget::widget([
	'id' => 'dtree',
	'class' => 'dtree',
	'tree' => $tree,
	'target' => '_blank',
	'useSelection' => false,
	'useLines' => true,
	'useIcons' => true,
	'useCookies' => true,
	'useStatusText' => false,
	'closeSameLevel' => true,
]) ?>
```
<a href="mailto:slavko.chita@gmail.com">write comments to admin</a>
