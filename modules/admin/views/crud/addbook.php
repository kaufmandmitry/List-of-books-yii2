<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<a href="/admin/crud/viewauthors">
<?= Html::submitButton('На главную', ['class' => 'btn btn-primary']) ?>
</a>

<h2>Введите данные о книге:</h2><br>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'author')->label("Имя автора")->textInput() ?>

<?= $form->field($model, 'book')->label("Название книги")->textInput() ?>

<?= $form->field($model, 'description')->label("Описание книги")->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>