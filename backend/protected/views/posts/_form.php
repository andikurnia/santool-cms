<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'posts-main-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'parent_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'label',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->ckEditorRow($model,'resume',array('options'=>array('fullpage'=>'js:true', 'height'=>'100', 'resize_maxWidth'=>'640','resize_minWidth'=>'320'))); ?>

	<?php echo $form->ckEditorRow($model,'content',array('options'=>array('fullpage'=>'js:true', 'resize_maxWidth'=>'640','resize_minWidth'=>'320'))); ?>
        
        <br /><br />
        <?php echo $form->textAreaRow($model,'tags',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>64)); ?>

	<?php //echo $form->textFieldRow($model,'position',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'permalink',array('class'=>'span5','maxlength'=>512)); ?>

	<?php //echo $form->textFieldRow($model,'author_id',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'author_name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php //echo $form->textFieldRow($model,'author_email',array('class'=>'span5','maxlength'=>64)); ?>

	<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>1)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
