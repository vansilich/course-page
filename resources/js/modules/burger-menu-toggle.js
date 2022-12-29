import { getBodyScrollTop } from "../utils/DOM";

export default class BurgerMenuToggle{

    bodyScrollY = null

    constructor(
        toggle_btn_selector,
        target_for_expanded_class_selector,
        expanded_class = 'open',
        menu_close_btn_selector,
        overlay_selector,
        body_lock_class = 'body-lock',
        anchor_link_class = 'anchor-link',
    ){
        this.toggleBtn = document.querySelector(toggle_btn_selector);
        this.target = document.querySelector(target_for_expanded_class_selector);
        this.closeBtn = this.target.querySelector(menu_close_btn_selector)

        this.expandedClass = expanded_class;
        this.body_lock_class = body_lock_class;

        this.anchor_link_class = anchor_link_class;

        this.overlay = false;
        if(overlay_selector) {
            this.overlay = document.querySelector(overlay_selector)
        }

        this.setup()
    }

    setup() {
        
        this.toggleBtn.addEventListener('click', () => {
            this.toggleMenu()
        })

        this.closeBtn.addEventListener('click', () => {
            this.toggleMenu()
        })

        document.body.addEventListener('click', (e) => {
            if(e.target === this.overlay){
                this.closeMenu();
            }
        })

        this.target.addEventListener('click', (e) => {
            if(e.target.classList.contains(this.anchor_link_class)){
                this.closeMenu();
            }
        })
    }

    toggleMenu(){
        if(this.target.classList.contains(this.expandedClass)){
            this.closeMenu()
        } else {
            this.openMenu();
        }
    }

    closeMenu(){
        if(this.overlay){
            this.overlay.style.display = 'none'
        }

        this.target.classList.remove(this.expandedClass);
        this.target.setAttribute('is-open', false)
        document.body.classList.remove(this.body_lock_class);

        window.scrollTo({
            left: 0,
            top: this.bodyScrollY
        });
    }

    openMenu(){
        if(this.overlay){
            this.overlay.style.display = 'block'
        }

        this.target.setAttribute('is-open', true)
        this.target.classList.add(this.expandedClass);

        this.bodyScrollY = getBodyScrollTop();
        document.body.style.top = `-${this.bodyScrollY}px`;
        document.body.classList.add(this.body_lock_class);

        window.scrollTo({
            left: 0,
            top: this.bodyScrollY
        });
    }

}