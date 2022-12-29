<div class="popup-apply-form-overlay popup-overlay hidden">

    <div class="popup-apply-form-wrapper popup">

        <form class="popup-apply-form" action="/sign-up/future/compas-3D" autocomplete="off">

            @csrf

            <div class="popup-apply-form__head">
                <h3 class="popup-apply-form__title">
                    ЗАПИСАТЬСЯ НА КУРС
                </h3>

                <p class="popup-apply-form__start">
                    Начало обучения: <span class="popup-apply-form__start-date">23 января</span>
                </p>
            </div>

            <div class="popup-apply-form__form-inputs-wrapper">

                <ul class="popup-apply-form__success"></ul>
                <ul class="popup-apply-form__errors"></ul>

                <input class="popup-apply-form__item popup-apply-form__text-input"
                    type="text"
                    name="name"
                    placeholder="Имя Фамилия"
                    autocomplete="off">

                <input class="popup-apply-form__item popup-apply-form__text-input"
                    type="email"
                    name="email"
                    placeholder="Email"
                    autocomplete="off">

                <input class="popup-apply-form__item popup-apply-form__text-input"
                    type="tel"
                    name="telephone"
                    placeholder="+7 (999) 999-99-99"
                    autocomplete="off">

                <div class="popup-apply-form__item popup-enroll-custom-checkbox-wrapper">
                    <label class="popup-enroll-custom-checkbox">
                        <input type="checkbox" id="popup-im-student-checkbox"
                            name="im-student" class="popup-enroll-custom-checkbox__input">
                        <img class="popup-enroll-custom-checkbox__checkmark" src="{{ asset('/assets/icons/pages/courses/compas_3d/checkbox-checkmark.svg') }}" alt="">
                    </label>
                    <label for="popup-im-student-checkbox">я студент</label>
                </div>

                <div class="popup-apply-form-choice">
                    <div class="popup-apply-form-choice__worker">
                        <input class="popup-apply-form__item popup-apply-form__text-input"
                            type="text"
                            name="company"
                            placeholder="Компания"
                            autocomplete="off">

                        <input class="popup-apply-form__item popup-apply-form__text-input"
                            type="text"
                            name="job"
                            placeholder="Должность"
                            autocomplete="off">
                    </div>

                    <div class="popup-apply-form-choice__student">
                        <input class="popup-apply-form__item popup-apply-form__text-input"
                            type="text"
                            name="educational-institution"
                            placeholder="Учебное заведение"
                            autocomplete="off">

                        <input class="popup-apply-form__item popup-apply-form__text-input"
                            type="text"
                            name="specialization"
                            placeholder="Специализация"
                            autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="popup-apply-form__bottom">
                <button class="popup-apply-form__submit" type="submit">
                    Отправить
                </button>

                <div class="popup-apply-policy">
                    <label class="popup-enroll-custom-checkbox">
                        <input type="checkbox" class="popup-enroll-custom-checkbox__input" checked disabled>
                        <img class="popup-enroll-custom-checkbox__checkmark" src="{{ asset('/assets/icons/pages/courses/compas_3d/checkbox-checkmark.svg') }}" alt="">
                    </label>

                    <div class="popup-apply-policy__text">
                        Записываясь, вы даете согласие на обработку своих персональных 
                        данных в соответствии с
                        <a href="https://fluid-line.ru/agreement" target="_blank"
                            class="popup-apply-policy__link">
                            политикой конфиденциальности
                        </a>
                        .
                    </div>
                </div>
            </div>
        </form>
    </div>


</div>
