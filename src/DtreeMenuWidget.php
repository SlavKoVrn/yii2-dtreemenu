<?php

namespace slavkovrn\dtreemenu;

use yii\base\Widget;

class DtreeMenuWidget extends Widget {

    public $id = 'dtree';
    public $class = 'dtree';
    public $tree = [];

    public $target = '_blank';
    public $useSelection = false;
    public $useLines = true;
    public $useIcons = true;
    public $useCookies = true;
    public $useStatusText = true;
    public $closeSameLevel = true;

    private $folder = '';
    private $page = '';
    private $script = '';
    private $out = '';
    private $dtree_id = 0;

    public function run() {

        parent::run();

        $this->registryScript();

        return $this->render('dtree',[
            'id' =>$this->id,
            'class' =>$this->class,
            'script'=> $this->script,
        ]);
    }

    protected function registryScript()
    {
        $path = \Yii::$app->getAssetManager()->publish(__DIR__ . '/assets/');

        $this->getView()->registerCssFile($path[1] . '/dtree/dtree.css');
        $this->getView()->registerJsFile($path[1] . '/dtree/dtree.js',[
            'position' => \yii\web\View::POS_HEAD
        ]);

        $this->folder = $path[1].'/dtree/img/folder.gif';
        $this->page = $path[1].'/dtree/img/page.png';

        $tree = $this->makeTree();

        $useSelection = ($this->useSelection)?'true':'false';
        $useLines = ($this->useLines)?'true':'false';
        $useIcons = ($this->useIcons)?'true':'false';
        $useCookies = ($this->useCookies)?'true':'false';
        $useStatusText = ($this->useStatusText)?'true':'false';
        $closeSameLevel = ($this->closeSameLevel)?'true':'false';

        $script =<<<JS
            <script type="text/javascript">
                dtree = new dTree('{$this->id}','{$path[1]}');
                dtree.config.target = '{$this->target}';
                dtree.config.useSelection = {$useSelection};
                dtree.config.useLines = {$useLines};
                dtree.config.useIcons = {$useIcons};
                dtree.config.useCookies = {$useCookies};
                dtree.config.useStatusText = {$useStatusText};
                dtree.config.closeSameLevel = {$closeSameLevel};
                dtree.add("0","-1","","","","");
                {$tree}
                document.write(dtree);
                dtree.closeAll();
                dtree.openTo("0","true");
            </script>
JS;

        $this->script = $script;
    }

    function getSubTree($massiv, $pid)
    {
        foreach($massiv as $key => $val)
        {
            $this->dtree_id++;
            if(isset($val['children']))
            {
                $this->out .= 'dtree.add("'.$this->dtree_id.'","'.$pid.'","'.$val['name'].'","'.$val['href'].'","'.$val['description'].'","'.$this->target.'","'.$this->folder.'");'.PHP_EOL;
                $this->getSubTree($val['children'], $this->dtree_id);
            } else {
                $this->out .= 'dtree.add("'.$this->dtree_id.'","'.$pid.'","'.$val['name'].'","'.$val['href'].'","'.$val['description'].'","'.$this->target.'","'.$this->page.'");'.PHP_EOL;
            }
        }
    }

    protected function makeTree()
    {
        $this->getSubTree($this->tree, 0);

        return $this->out;
    }
}