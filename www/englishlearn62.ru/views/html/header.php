<?php

use app\models\Auth;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
?>
<header>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img width="64" src="/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/" class="nav-link d-flex flex-column">
                            <span class="fs-4 fw-bold text-info fst-italic" style="text-shadow: white 1px 1px 1px;">
                                <?= Yii::$app->name ?>
                            </span>
                            <small class="text-info font-monospace">
                                <?= Yii::$app->params['subtitle'] ?>
                            </small>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="/faq">Вопрос/Ответ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="/about">О проекте</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if (Auth::isAdmin() || Auth::isTeacher() || Auth::isStudent()) : ?>

                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Регистрация/Авторизация
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item  fw-bold" href="/student/auth/login">Студент</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item  fw-bold" href="/teacher/auth/login">Преподаватель</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item  fw-bold" href="/admin/auth/login">Администратор</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <?php if (Auth::isAdmin()) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="/admin/home">Администратор</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="/admin/auth/logout">Выйти</a>
                        </li>
                    <?php endif ?>
                    <?php if (Auth::isStudent()) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="/student/home">Студент</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="/student/auth/logout">Выйти</a>
                        </li>
                    <?php endif ?>
                    <?php if (Auth::isTeacher()) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="/teacher/home">Преподаватель</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="/teacher/auth/logout">Выйти</a>
                        </li>
                    <?php endif ?>

                </ul>
            </div>
        </div>
    </nav>
</header>