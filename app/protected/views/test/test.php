
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm'); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->label($model,'request'); ?>
        <?php echo $form->textArea($model,'request',array('rows'=>10, 'cols'=>70)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'response'); ?>
        <?php echo $form->textArea($model,'response',array('rows'=>10, 'cols'=>70)); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Надіслати'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>