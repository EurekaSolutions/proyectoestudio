<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span12">      
         <?php echo $content; ?>
    </div>
    <!--<div class="span3">
        <div id="sidebar">
        <?php
            /*$this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operations',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();*/
        ?>
        </div><!-- sidebar -->
    <!--</div>-->
</div>
<?php $this->endContent(); ?>