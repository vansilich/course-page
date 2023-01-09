import '../../../app';

import BurgerMenuToggle from '../../../modules/burger-menu-toggle';
import CommentsExpand from "../../../modules/comments-list";
import ModulesList from "../../../modules/modules-list";
import Popup from "../../../modules/popup";
import MouseParallax from "../../../modules/animation/MouseParallax";
import FormHandler from "../../../modules/FormHandler";

import {emailSubmitValidator, phoneSubmitValidator, notEmptySubmitValidator} from "../../../utils/validation/FormSubmitValidators";
import {phoneLiveValidator} from "../../../utils/validation/LiveValidators";

// переключатель инпутов в форме
document.querySelector('#popup-im-student-checkbox').addEventListener('change', (e) => {
    const workerInputsWrapper = document.querySelector('.popup-apply-form-choice__worker');
    const studentInputsWrapper = document.querySelector('.popup-apply-form-choice__student');

    if(e.target.checked){
        workerInputsWrapper.style.display = 'none';
        studentInputsWrapper.style.display = 'block';
    } else {
        workerInputsWrapper.style.display = 'block';
        studentInputsWrapper.style.display = 'none';
    }
});

// переключатель инпутов в форме
document.querySelector('#im-student-checkbox').addEventListener('change', (e) => {
    const workerInputsWrapper = document.querySelector('.apply-form-choice__worker');
    const studentInputsWrapper = document.querySelector('.apply-form-choice__student');

    if(e.target.checked){
        workerInputsWrapper.style.display = 'none';
        studentInputsWrapper.style.display = 'block';
    } else {
        workerInputsWrapper.style.display = 'block';
        studentInputsWrapper.style.display = 'none';
    }
})

const rightNavBurger = document.querySelector('.top-nav__burger-menu');
// Скрываем .top-nav__right когда открыто мобильное меню
const rightNavBurgerObserver = new MutationObserver((mutations) => {

    const rightNav = document.querySelector('.top-nav__right');
    if(rightNavBurger.getAttribute('is-open') === 'false'){
        rightNav.style.display = 'block';
    } else {
        rightNav.style.display = 'none';
    }
});
rightNavBurgerObserver.observe(rightNavBurger, {
    attributes: true //Слушаем только атрибуты
});
new BurgerMenuToggle(
    '.top-nav__burger-menu-icon',
    '.top-nav__burger-menu',
    'open',
    '.nav-burger-menu__close',
    '.popup-overlay.nav-burger-menu-overlay',
);

// Popup по открытию кнопки из навигации
new Popup(
    '.top-nav__button',
    '.popup-apply-form-overlay',
    'hidden'
);

// Popup по открытию кнопки из мобильного меню
new Popup(
    '.nav-mobile-enroll-btn',
    '.popup-apply-form-overlay',
    'hidden'
);

new ModulesList(
    '.programs__item',
    '.program-block',
    'expanded'
)

new CommentsExpand(
    '.review__wrapper',
    '.review-item',
    '.expand-all-comments',
    '.hide-all-comments',
    '.review-item__content',
    '.expand-review',
    '.hide-review',
    'expanded',
    3
);

new MouseParallax(
    '.promo-animated__3D-1',
    1.7,
    2
);

new MouseParallax(
    '.promo-animated__3D-2',
    1.5,
    -1.5
);

new FormHandler(
    '/sign-up/course/valve-modeling',
    '.popup-apply-form',
    {
        'input[name="name_and_surname"]': {
            inputName: 'Имя',
            submitValidators: [notEmptySubmitValidator]
        },
        'input[name="email"]': {
            inputName: 'Имейл',
            submitValidators: [emailSubmitValidator]
        },
        'input[name="phone"]': {
            inputName: 'Телефон',
            liveValidator: phoneLiveValidator,
            submitValidators: [phoneSubmitValidator]
        },
    },
    'error',
    '.popup-apply-form__errors',
    '.popup-apply-form__success'
);

new FormHandler(
    '/sign-up/course/valve-modeling',
    '.apply-form__form',
    {
        'input[name="name_and_surname"]': {
            inputName: 'Имя',
            submitValidators: [notEmptySubmitValidator]
        },
        'input[name="email"]': {
            inputName: 'Имейл',
            submitValidators: [emailSubmitValidator]
        },
        'input[name="phone"]': {
            inputName: 'Телефон',
            liveValidator: phoneLiveValidator,
            submitValidators: [phoneSubmitValidator]
        },
    },
    'error',
    '.apply-form__errors',
    '.apply-form__success'
);