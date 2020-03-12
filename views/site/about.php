<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1>Тестовое задание для РНР разработчика</h1>
<strong>Обязательная часть задания</strong>
<p>Необходимо разработать сервис общедоступных закладок на базе любого современного
фреймворка (Laravel, Yii, Symfony, etc), который позволяет:</p>
    <ul>
        <li>
просматривать список всех закладок
        </li><li>
просматривать детальную информацию о закладке
        </li><li>
добавлять новую закладку
        </li>
    </ul>
Закладка представляет собой запись в БД со следующей информацией:
    <ul>
        <li>
Дата добавления
        </li><li>
Favicon
        </li><li>
URL страницы
        </li><li>
Заголовок страницы
        </li><li>
МЕТА Description
        </li><li>
МЕТА Keywords
        </li>
    </ul>
<p>На странице списка закладок отображается общий список закладок (сортировка: дата, по-
убыванию) с постраничной навигацией с возможность перейти на страницу детальной
информации. Список полей для отображения:</p>
    <ul>
        <li>
Дата добавления
        </li><li>
Favicon
        </li><li>
URL страницы
        </li><li>
Заголовок страницы
        </li>
    </ul>

<p>На странице детальной информации о закладке выводится весь список полей.</p>
<p>На странице добавления новой закладки необходимо вывести поле для ввода URL и
кнопку “Добавить”. По нажатию на кнопку “Добавить” необходимо проверить, что данной
закладки ещё нет в БД, скачать страницу по URL, получить из содержимого информацию
для создания закладки, добавить запись в БД.
После успешного добавления закладки пользователь перенаправляется на страницу
детальной информации о закладке.</p>
<p>В случае ошибки (неверный URL, сервер недоступен и т.д.) пользователь остается на
странице добавления закладки, при этом ему выводится ошибка.</p>

<strong>Дополнительные задания</strong>
<p>Дополнительные задания не являются обязательными для выполнения, однако их
выполнение позволяет лучше оценить уровень соискателя. Каждое из заданий направлено
на оценку разных качеств разработчика, таких как умение работать с фреймворком,
обеспечение безопасности кода, решение нестандартных задач и обеспечение быстрой
работы кода в условиях высоких нагрузок.</p>
<p>Допускается как выполнение части заданий, так и их невыполнение в целом.</p>
<strong>Дополнительное задание #1:</strong>
<p>В списке закладок предусмотреть возможность сортировки закладок пользователем по
полям “Дата добавления", “URL страницы”, “Заголовок страницы” как по-возрастанию, так и
по-убыванию.<p>
<strong>Дополнительное задание #2:</strong>
<p>В списке закладок предусмотреть кнопку “Экспорт в Excel", по нажатию которой
необходимо выгрузить весь список закладок в Excel файл и запустить процесс скачивания
файла у пользователя.</p>
<strong>Дополнительное задание #3:</strong>
<p>Предусмотреть возможность удаления закладки. Для этого на странице создания
закладки добавить возможность указания пароля для удаления закладки. На странице
детальной информации о закладке добавить кнопку “Удалить", по нажатию на которую
необходимо запросить у пользователя пароль для удаления, и в случае правильного ввода
пароля - закладку удалить из БД.</p>
<strong>Дополнительное задание #4:</strong>
<p>Реализовать высокопроизводительный поиск по закладкам, учитывающий поля “URL
страницы", “Заголовок страницы", “МЕТА Description", "МЕТА Keywords", рассчитанный на
количество записей в БД до 100 ООО в условиях высокой нагрузки. Строка поиска должна
выводиться над общим списком закладок, страница результата поиска аналогична списку.</p>
<p>Стек технологий для реализации требований не ограничивается.</p>
<strong>Требования к решению</strong>
    <ul>
        <li>
Решение должно быть выполнено с использованием любого современного
фреймворка, например (но не ограничиваясь) - Laravel, Yii, Symfony.
        </li><li>
Для решения задачи приветствуется использование менеджера зависимостей
Composer и сторонних библиотек, если в этом есть необходимость
        </li>
    </ul>

<strong>Критерии оценки</strong>
    <ul>
        <li>
Умение отделить бизнес-логику от логики фреймворка
        </li><li>
Грамотное использование возможностей фреймворка
        </li><li>
Аккуратный документированный код, соблюдение PSR стандартов оформления кода
        </li><li>        
Безопасность кода
        </li><li>
Работоспособность решения
        </li>
    </ul>
        
    
    <hr>
    <strong>Что реализовано:<strong>
    <ul>
        <li>     
Основной функционал
        </li><li>
Дополнительное задание #1 - т.к. является опцией по умолчанию для шаблона gii.
        </li><li>
Дополнительное задание #3
        </li>
    </ul> 
    <strong>Что не реализовано:<strong>
    <ul>
        <li>     
Дополнительное задание #2 - попробовал решение от картика, но экспорт картинки не происходит. Оставил в отдельной ветке для ознакомления.
        </li><li>
Дополнительное задание #4 - предполагает серьёзные временные вложения
        </li>
    </ul> 
</div>

