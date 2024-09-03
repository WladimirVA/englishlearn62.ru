<?php
    $this -> title = 'Вопрос-ответ'
?>
<div class="container">
    <?= $this->render('/html/h1', ['h1' => $this->title]) ?>
</div>
<main class="pt-4">
    <div class="container">
        <div class="row mt-1 mb-5">
            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                <div class="card  text-white text-start">
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Как студенту пользоваться сайтом?
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong class="text-primary fs-6">
                                        Студент может авторизоваться на отдельной странице, после чего студенту
                                        предоставляется доступ к урокам и материалам по ним, после их изучения студент
                                        может пройти задания и отправить их на проверку.
                                    </strong>
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Как преподавателю пользоваться сайтом?
                                </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong class="text-primary fs-6">
                                     Преподаватель может авторизоваться на отдельной странице, после чего преподавателю
                                     предоставляется доступ к управлению заданиями для студентов, созданию уроков и тем для прохождения на курсе.
                                     Преподаватель может проверять отправленные работы студентов и фиксировать результаты проверок.
                                    </strong>
                                </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Как администратору пользоваться сайтом?
                                </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong class="text-primary fs-6">
                                        Администратор может авторизоваться на отдельной странице, после чего администратору предоставляется доступ к управлению данными
                                        студентов, преподавателей, а также к просмотру статистики.
                                    </strong>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>