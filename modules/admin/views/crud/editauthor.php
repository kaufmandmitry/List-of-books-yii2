<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
    <a href="/admin/crud/viewauthors">
        <?= Html::submitButton('На главную', ['class' => 'btn btn-primary']) ?>
    </a>

    <h2>Введите новые данные об авторе:</h2><br>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($author, 'Name')->label("Имя автора")->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>