<div class="popup-overlay hidden">

    <div class="popup-apply-form popup">

        <h3 class="popup-apply-form__title">
            ЗАПИСАТЬСЯ НА КУРС
        </h3>

        <form class="popup-apply-form__form" action="/send/request" autocomplete="off">
            <ul class="apply-form__success"></ul>
            <ul class="apply-form__errors"></ul>

            <div class="popup-apply-form__form-content">

                <div class="popup-apply-form__form-content-left">
                    <div class="popup-apply-form__date-content">

                        <span class="popup-apply-form__pre-date-text">
                            Начало обучения:
                        </span>
                        <span class="popup-apply-form__date">
                            31 октября
                        </span>

                    </div>

                    <ul class="popup-apply-form__errors"></ul>

                    <input class="popup-apply-form__text-input text-input"
                        type="text" name="name"
                        placeholder="Имя Фамилия"
                        autocomplete="off">

                    <input class="popup-apply-form__text-input text-input"
                        type="email" name="email"
                        placeholder="Email"
                        autocomplete="off">

                    <input class="popup-apply-form__text-input text-input"
                        type="tel"
                        name="telephone"
                        placeholder="Номер телефона"
                        autocomplete="off">
                </div>

                <img class="popup-apply-form__form-content-logo" src="{{ asset('/assets/icons/form-apply.svg') }}">
            </div>

            @csrf
            <button class="popup-apply-form__submit" type="submit">
                Записаться на курс
            </button>
            <a href="/" type="button" class="popup-apply-form-close popup-apply-form__submit">
                Закрыть
            </a>

            <div class="popup-apply-policy">
                <input type="checkbox" name="policy-apply" class="popup-apply-policy__checkbox" checked disabled>

                <div class="popup-apply-policy__text">
                    Записываясь, вы принимаете и даёте согласие на обработку своих
                    персональных данных в соответствии с <a href="https://fluid-line.ru/agreement" class="popup-apply-policy__link">политикой конфиденциальности</a>.
                </div>
            </div>
        </form>
    </div>

</div>
