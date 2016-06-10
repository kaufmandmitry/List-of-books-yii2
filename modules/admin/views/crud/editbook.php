<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <a href="/admin/crud/viewbooks">
        <?= Html::submitButton('На главную', ['class' => 'btn btn-primary']) ?>
    </a>

    <h2>Введите новые данные о книге:</h2><br>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($book, 'Title')->label("Название книги")->textInput() ?>

<?= $form->field($book, 'Description')->label("Описание книги")->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>