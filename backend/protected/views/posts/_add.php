<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-main-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        Categories
        <?php echo $form->hiddenField($model,'terms_id'); ?>
        <?php
            $this->widget('ext.editable.EditableField', array(
                'type' => 'select',
                'model' => $model,
                'attribute' => 'terms_id',
                'url' => $this->createUrl('posts/create'),
                'source' => CHtml::listData(Terms::model()->findAll(), 'id', 'label'), 
                'onUpdate' => 'js: function(e, editable) {
                                   $("#PostsMain_terms_id").val(editable.value);
                               }',
                'placement' =>  'right'
            ));
        ?>
        <br /><br />

        Parent
        <?php echo $form->hiddenField($model,'parent_id'); ?>
        <?php
            $this->widget('ext.editable.EditableField', array(
                'type' => 'select',
                'model' => $model,
                'attribute' => 'parent_id',
                'url' => $this->createUrl('posts/create'),
                'source' => CHtml::listData(Posts::model()->getParent(), 'id', 'label'), 
                'onUpdate' => 'js: function(e, editable) {
                                   $("#PostsMain_parent_id").val(editable.value);
                               }',
                'placement' =>  'right'
            ));
        ?>
        <br /><br />

	<?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->ckEditorRow($model,'resume',array('options'=>array('fullpage'=>'js:true', 'height'=>'100', 'resize_maxWidth'=>'640','resize_minWidth'=>'320'))); ?>

	<?php echo $form->ckEditorRow($model,'content',array('options'=>array('fullpage'=>'js:true', 'resize_maxWidth'=>'640','resize_minWidth'=>'320'))); ?>
        <br /><br />
        <?php echo $form->textAreaRow($model,'tags',array('class'=>'span5')); ?>
        <br /><br />
        Type
        <?php echo $form->hiddenField($model,'type'); ?>
        <?php
            $this->widget('ext.editable.EditableField', array(
                'type' => 'select',
                'model' => $model,
                'attribute' => 'type',
                'url' => $this->createUrl('posts/create'),
                'source' => CHtml::listData(PostsType::model()->getPostsType(), 'id', 'label'), 
                'onUpdate' => 'js: function(e, editable) {
                                   $("#PostsMain_type").val(editable.value);
                               }',
                'placement' =>  'right'
            ));
        ?>
        <br /><br />

	<?php echo $form->textFieldRow($model,'position',array('class'=>'span5', 'value'=>0)); ?>
        
        

	<?php echo $form->textFieldRow($model,'permalink',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->hiddenField($model,'author_id',array('class'=>'span5', 'value'=>Yii::app()->user->id)); ?>

	<?php echo $form->hiddenField($model,'author_name',array('class'=>'span5','maxlength'=>128, 'value'=>Yii::app()->user->get()->name)); ?>

	<?php echo $form->hiddenField($model,'author_email',array('class'=>'span5','maxlength'=>64, 'value'=>Yii::app()->user->get()->email)); ?>

	<?php echo $form->hiddenField($model,'status',array('class'=>'span5','maxlength'=>1, 'value'=>'1')); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>