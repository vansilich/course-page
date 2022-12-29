import {getBodyScrollTop} from "../utils/DOM";

export default class Popup{

    bodyScrollY = null;

    constructor(
        modal_open_selector,
        modal_overlay_selector,
        overlay_hide_class = 'hidden',
        body_lock_class = 'body-lock'
    ) {
        this.modal_openers = document.querySelectorAll(modal_open_selector);
        this.poup_overlay = document.querySelector(modal_overlay_selector);

        this.body_lock_class = body_lock_class;
        this.overlay_hide_class = overlay_hide_class;

        this.setupEvents();
    }

    setupEvents(){
        this.modal_openers.forEach(opener => {

            opener.addEventListener('click', event => {
                event.preventDefault();

                this.togglePopup();
            });
        });

        this.poup_overlay.addEventListener('click', event => {
            const target = event.target;

            if (target === this.poup_overlay){
                this.closePopup();
            }
        })
    }

    togglePopup() {
        const isOpen = !this.poup_overlay.classList.contains(this.overlay_hide_class);

        if (!isOpen){
            this.openPopup();
        } else {
            this.closePopup();
        }
    }

    openPopup(){
        // opening popup

        this.bodyScrollY = getBodyScrollTop();
        document.body.style.top = `-${this.bodyScrollY}px`;

        document.body.classList.add(this.body_lock_class);
        this.poup_overlay.classList.remove(this.overlay_hide_class);

        window.scrollTo({
            left: 0,
            top: this.bodyScrollY
        });
    }

    closePopup(){
        // closing popup

        document.body.classList.remove(this.body_lock_class);
        this.poup_overlay.classList.add(this.overlay_hide_class);

        window.scrollTo({
            left: 0,
            top: this.bodyScrollY
        });
    }

}
