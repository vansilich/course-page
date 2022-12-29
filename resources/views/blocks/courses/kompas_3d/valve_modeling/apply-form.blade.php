<div class="apply-form">

    <h3 class="apply-form__title">
        ЗАПИСАТЬСЯ НА КУРС
    </h3>

    <p class="apply-form__start">
        Начало обучения: <span class="apply-form__start-date">23 января</span>
    </p>

    <form class="apply-form__form" action="/sign-up/future/compas-3D" autocomplete="off">
        @csrf

        <ul class="apply-form__success"></ul>
        <ul class="apply-form__errors"></ul>

        <input class="apply-form__item apply-form__text-input"
            type="text"
            name="name"
            placeholder="Имя Фамилия"
            autocomplete="off">

        <input class="apply-form__item apply-form__text-input"
            type="email"
            name="email"
            placeholder="Email"
            autocomplete="off">

        <input class="apply-form__item apply-form__text-input"
            type="tel"
            name="telephone"
            placeholder="+7 (999) 999-99-99"
            autocomplete="off">

        <div class="apply-form__item enroll-custom-checkbox-wrapper">
            <label class="enroll-custom-checkbox">
                <input type="checkbox" id="im-student-checkbox"
                    name="im-student" class="enroll-custom-checkbox__input">
                <img class="enroll-custom-checkbox__checkmark" src="{{ asset('/assets/icons/pages/courses/compas_3d/checkbox-checkmark.svg') }}" alt="">
            </label>
            <label for="im-student-checkbox">я студент</label>
        </div>

        <div class="apply-form-choice">
            <div class="apply-form-choice__worker">
                <input class="apply-form__item apply-form__text-input"
                    type="text"
                    name="company"
                    placeholder="Компания"
                    autocomplete="off">

                <input class="apply-form__item apply-form__text-input"
                    type="text"
                    name="job"
                    placeholder="Должность"
                    autocomplete="off">
            </div>

            <div class="apply-form-choice__student">
                <input class="apply-form__item apply-form__text-input"
                    type="text"
                    name="educational-institution"
                    placeholder="Учебное заведение"
                    autocomplete="off">

                <input class="apply-form__item apply-form__text-input"
                    type="text"
                    name="specialization"
                    placeholder="Специализация"
                    autocomplete="off">
            </div>
        </div>

        <button class="apply-form__submit" type="submit">
            Отправить
        </button>

        <div class="apply-form__bottom apply-policy">
            <label class="enroll-custom-checkbox">
                <input type="checkbox" id="im-student-checkbox"
                    name="im-student" class="enroll-custom-checkbox__input" checked disabled>
                <img class="enroll-custom-checkbox__checkmark" src="{{ asset('/assets/icons/pages/courses/compas_3d/checkbox-checkmark.svg') }}" alt="">
            </label>

            <div class="apply-policy__text">
                Записываясь, вы даете согласие на обработку своих персональных 
                данных в соответствии с
                <a href="https://fluid-line.ru/agreement" target="_blank"
                    class="apply-policy__link">
                    политикой конфиденциальности
                </a>
                .
            </div>
        </div>
    </form>
</div>
