<?php
class CmsLinkPager extends CLinkPager{
    /**
     * Initializes the pager by setting some default property values.
     */
    public $maxButtonCount = 5;
    public function init()
    {
        $this->nextPageLabel = '下一页';
        $this->prevPageLabel = '上一页';
        $this->firstPageLabel = '首页';
        $this->lastPageLabel = '尾页';
        if($this->header===null)
            $this->header=Yii::t('yii','Go to page: ');

        if(!isset($this->htmlOptions['id']))
            $this->htmlOptions['id']=$this->getId();
        if(!isset($this->htmlOptions['class']))
            $this->htmlOptions['class']='yiiPager';
    }

    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        $this->registerClientScript();
        $buttons=$this->createPageButtons();
        if(empty($buttons))
            return;
        echo $this->header;
        echo $buttons['first'];
        echo $buttons['prev'];
        echo "<span>";
        foreach($buttons['internal'] as $val){
            echo $val;
        }
        echo "</span>";
        echo $buttons['next'];
        echo $buttons['last'];
        echo $this->footer;
    }

    public function createPageButtons(){
        if(($pageCount=$this->getPageCount())<=1)
            return array();

        list($beginPage,$endPage)=$this->getPageRange();
        $currentPage=$this->getCurrentPage(false); // currentPage is calculated in getPageRange()
        $buttons=array();

        // first page
        $buttons['first']=$this->createPageButton($this->firstPageLabel,0,$this->firstPageCssClass,$currentPage<=0,false);

        // prev page
        if(($page=$currentPage-1)<0)
            $page=0;
        $buttons['prev']=$this->createPageButton($this->prevPageLabel,$page,$this->previousPageCssClass,$currentPage<=0,false);

        // internal pages
        for($i=$beginPage;$i<=$endPage;++$i)
            $buttons['internal'][]=$this->createPageButton($i+1,$i,$this->internalPageCssClass,false,$i==$currentPage);

        // next page
        if(($page=$currentPage+1)>=$pageCount-1)
            $page=$pageCount-1;
        $buttons['next']=$this->createPageButton($this->nextPageLabel,$page,$this->nextPageCssClass,$currentPage>=$pageCount-1,false);

        // last page
        $buttons['last']=$this->createPageButton($this->lastPageLabel,$pageCount-1,$this->lastPageCssClass,$currentPage>=$pageCount-1,false);

        return $buttons;
    }

    protected function createPageButton($label,$page,$class,$hidden,$selected)
    {
        if($hidden || $selected)
            $class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
        $class.=' fg-button ui-button ui-state-default';
        if($selected)
            $class.=' ui-state-disabled';
        return CHtml::link($label,$this->createPageUrl($page),array('class'=>$class));
    }
}