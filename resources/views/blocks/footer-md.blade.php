<footer class="footer-md">
    <div class="container">
        <div class="footer-content">

            <img class="footer-content__logo" src="{{ asset('/assets/icons/logo-white.svg') }}" alt="fluid-line">

            <div class="footer-content__right footer-text">

                <div class="footer-text__left footer-contacts">
                    <a href="tel:74957411291" class="footer-contacts__phone">
                        +7 (495) 741-12-91
                    </a>

                </div>
                <div class="footer-text__right footer-contacts">
                    <a href="mailto:kurs@fluid-line.ru" class="footer-contacts__email">
                        kurs@fluid-line.ru
                    </a>
                </div>
            </div>

        </div>
        <div class="footer-content footer-links">
            <div class="footer-content__left footer-links">
                <a href="https://fluid-line.ru/about" class="footer-links__link">
                    О нас
                </a>
                <a href="{{ route('privacy-policy') }}" class="footer-links__link">
                    Политика конфиденциальности
                </a>
            </div>
            <div class="footer-content__right">
                <div class="footer-socials">
                    <a class="footer-socials__item footer-socials__web">
                        <img class="footer-socials__img" src="{{ asset('/assets/icons/socials/web.svg') }}" alt="web">
                    </a>
                    <a class="footer-socials__item footer-socials__youtube">
                        <img class="footer-socials__img" src="{{ asset('/assets/icons/socials/youtube.svg') }}" alt="youtube">
                    </a>
                    <a class="footer-socials__item footer-socials__vk">
                        <img class="footer-socials__img" src="{{ asset('/assets/icons/socials/vk.svg') }}" alt="vk">
                    </a>
                    <a class="footer-socials__item footer-socials__dzen">
                        <img class="footer-socials__img" src="{{ asset('/assets/icons/socials/dzen.svg') }}" alt="dzen">
                    </a>
                    <a class="footer-socials__item footer-socials__telegram">
                        <img class="footer-socials__img" src="{{ asset('/assets/icons/socials/telegram.svg') }}" alt="telegram">
                    </a>
                    <a class="footer-socials__item footer-socials__ok">
                        <img class="footer-socials__img" src="{{ asset('/assets/icons/socials/ok.svg') }}" alt="ok">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
