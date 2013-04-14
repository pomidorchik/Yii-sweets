# Yii-sweets
Коллекция полезностей для фреймворка Yii.



## DialogCRUD
Шаблоны `Gii` для реализации CRUD на диалоговых окнах. Подробное описание в блоге автора: [http://savvateev.org/blog/53/](http://savvateev.org/blog/53/).

#### Внимание !!!
Для предотвращения повторной загрузки скриптов и стилей при показе AJAX форм рекомендуется воспользоваться расширением [nlsclientscript](http://www.yiiframework.com/extension/nlsclientscript/).

#### Использование
*   Скопируйте папку `DialogCRUD` в директорию фреймворка `yii\framework\gii\generators\crud\templates\`

*   При создании `CRUD` c помощью `Gii` в выпадающем списке выбирайте нужный шаблон.



## DialogCRUD_TB
Аналогичные шаблоны, для [Yii-Bootstrap](http://www.cniska.net/yii-bootstrap/) или [YiiBooster](http://yiibooster.clevertech.biz/).

Копируем в `\protected\extensions\bootstrap\gii\bootstrap\templates\` и пользуемся.



## PHPValidator
Валидатор проверяющий PHP код на наличие ошибок.