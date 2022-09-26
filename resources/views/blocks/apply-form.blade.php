<div class="apply-form">

    <h3 class="apply-form__title">
        ЗАПИСАТЬСЯ НУ КУРС
    </h3>

    <div class="apply-form__start apply-date">
        <span class="apply-date__text">
            Начало обучения
        </span>

        <span class="apply-date__date">
            17 октября
        </span>
    </div>

    <form class="apply-form__form" action="http://course.local/send/request" autocomplete="off">
        @csrf

        <ul class="apply-form__success"></ul>
        <ul class="apply-form__errors"></ul>

        <input class="apply-form__text-input text-input"
            type="text"
            name="name"
            placeholder="Имя Фамилия"
            autocomplete="off">

        <input class="apply-form__text-input text-input"
            type="email"
            name="email"
            placeholder="Email"
            autocomplete="off">

        <input class="apply-form__text-input text-input"
            type="tel"
            name="telephone"
            placeholder="Номер телефона"
            autocomplete="off">

        <button class="apply-form__submit" type="submit">
            Отправить
        </button>

        <div class="apply-form__bottom apply-policy">
            <input type="checkbox" name="policy-apply" class="apply-policy__checkbox">

            <div class="apply-policy__text">
                Записываясь, вы принимаете условия <a href="" class="apply-policy__link">договора-оферты</a>
                и даете согласие на обработку своих
                персональных данных в соответствии с <a href="" class="apply-policy__link">политикой конфиденциальности</a>.
            </div>
        </div>
    </form>

</div>
