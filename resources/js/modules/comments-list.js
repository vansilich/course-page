import {parentByQuerySelector, getBodyScrollTop} from "../utils/DOM";

export default class CommentList{

    bodyYOffset = 0;

    constructor(
        wrapper_selector,
        item_selector,
        list_expand_selector,
        list_hide_selector,
        item_content_selector,
        expand_btn_selector,
        hide_btn_selector,
        item_expanded_class = 'expanded',
        min_shown_items = 3
    ) {
        this.wrapper = document.querySelector(wrapper_selector);
        this.items = document.querySelectorAll(item_selector);

        this.list_expand_button = document.querySelector(list_expand_selector);
        this.list_hide_button = document.querySelector(list_hide_selector);

        this.min_shown_items = min_shown_items;

        this.item_content_selector = item_content_selector;
        this.expand_btn_selector = expand_btn_selector;
        this.hide_btn_selector = hide_btn_selector;

        this.item_expanded_class = item_expanded_class;

        this.hideItems();
        this.addButtonListeners();
    }

    hideItems(){
        window.scrollTo({
            top: this.bodyYOffset,
            left: 0
        });

        this.list_hide_button.style.display = 'none';
        this.list_expand_button.style.display = 'block';

        this.items.forEach((item, index) => {
            if (index >= this.min_shown_items) {
                this.hideItemContent(item.querySelector(this.item_content_selector));
                item.style.display = 'none';
            }
        });
    }

    showItems(){
        this.bodyYOffset = getBodyScrollTop();

        this.list_hide_button.style.display = 'block';
        this.list_expand_button.style.display = 'none';

        this.items.forEach((item, index) => {
            if (index >= this.min_shown_items) {
                item.style.display = 'flex';
            }
        });
    }

    addButtonListeners(){
        this.list_hide_button.addEventListener('click', () => this.hideItems());
        this.list_expand_button.addEventListener('click', () => this.showItems());

        document.querySelectorAll(this.expand_btn_selector).forEach(button => {
            const item = parentByQuerySelector(button, this.item_content_selector);

            button.addEventListener('click', () => this.expandItemContent(item));
        });

        document.querySelectorAll(this.hide_btn_selector).forEach(button => {
            const item = parentByQuerySelector(button, this.item_content_selector);

            button.addEventListener('click', () => this.hideItemContent(item));
        });
    }

    expandItemContent(item){
        item.classList.add(this.item_expanded_class)
    }

    hideItemContent(item){
        item.classList.remove(this.item_expanded_class);
    }
}
