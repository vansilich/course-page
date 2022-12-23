<section class="program" id="program">
    <div class="container">

        <h3 class="program__title">
            ПРОГРАММА:
        </h3>

        <div class="program__content">

            <div class="programs">
                <!-- <div class="programs__item">

                    <a class="program-block">
                        <div class="program-block__text">
                            <p class="program-block__title">
                                МОДУЛЬ №1
                            </p>
                            <p class="program-block__description">
                                Введение в курс
                            </p>
                        </div>

                        <img class="program-block__icon" src="{{ asset('/assets/icons/program-toggle.svg') }}" alt="">
                    </a>

                    <ul class="program-content">
                        <li>
                            Знакомство с преподавателем курса
                        </li>
                        <li>
                            Знакомство с интерфейсом программы
                        </li>
                    </ul>
                </div> -->

                <div class="programs__item">

                    <a class="program-block">
                        <div class="program-block__text">
                            <p class="program-block__title">
                                МОДУЛЬ №1
                            </p>
                            <p class="program-block__description">
                                Работа с эскизами
                            </p>
                        </div>

                        <img class="program-block__icon" src="{{ asset('/assets/icons/program-toggle.svg') }}" alt="">
                    </a>

                    <ul class="program-content">
                        <li>
                            Панель «Геометрия» - часть 1
                        </li>
                        <li>
                            Панель «Геометрия» - часть 2
                        </li>
                        <li>
                            Панель «Изменение геометрии»
                        </li>
                        <li>
                            Панель «Размеры»
                        </li>
                        <li>
                            Панель настроек рабочего пространства эскиза
                        </li>
                        <li>
                            Панель «Ограничения»
                        </li>
                        <li>
                            Выполнение эскиза плоского контура
                        </li>

                    </ul>
                </div>

                <div class="programs__item">

                    <a class="program-block">
                        <div class="program-block__text">
                            <p class="program-block__title">
                                МОДУЛЬ №2
                            </p>
                            <p class="program-block__description">
                                Моделирование призматических деталей
                            </p>
                        </div>

                        <img class="program-block__icon" src="{{ asset('/assets/icons/program-toggle.svg') }}" alt="">
                    </a>

                    <ul class="program-content">
                        <li>
                            Операция «Элемент выдавливания»
                        </li>
                        <li>
                            Моделирование призматической детали - часть 1
                        </li>
                        <li>
                            Моделирование призматической детали - часть 2
                        </li>
                        <li>
                            Дополнительные команды 3-D моделирования
                        </li>
                    </ul>
                </div>

                <div class="programs__item">

                    <a class="program-block">
                        <div class="program-block__text">
                            <p class="program-block__title">
                                МОДУЛЬ №3
                            </p>
                            <p class="program-block__description">
                                Работа с чертежами
                            </p>
                        </div>

                        <img class="program-block__icon" src="{{ asset('/assets/icons/program-toggle.svg') }}" alt="">
                    </a>

                    <ul class="program-content">
                        <li>
                            Создание чертежа. Получение проекций
                        </li>
                        <li>
                            Создание чертежа. Выполнение разрезов
                        </li>
                        <li>
                            Оформление чертежа - часть 1
                        </li>
                        <li>
                            Оформление чертежа - часть 2
                        </li>
                    </ul>
                </div>

                <div class="programs__item">

                    <a class="program-block">
                        <div class="program-block__text">
                            <p class="program-block__title">
                                МОДУЛЬ №4
                            </p>
                            <p class="program-block__description">
                                Моделирование деталей типа тела вращения
                            </p>
                        </div>

                        <img class="program-block__icon" src="{{ asset('/assets/icons/program-toggle.svg') }}" alt="">
                    </a>

                    <ul class="program-content">
                        <li>
                            Выполнение эскизов для тел вращения. Операция «Элемент вращения»
                        </li>
                        <li>
                            Моделирование детали «Стержень»
                        </li>
                        <li>
                            Выполнение чертежа детали «Стержень»
                        </li>
                        <li>
                            Деталь «Клапан» и получение ее чертежа
                        </li>
                    </ul>
                </div>

            </div>

            <div class="program-form-wrapper">
                @include('blocks.apply-form')
            </div>
        </div>
    </div>
</section>
