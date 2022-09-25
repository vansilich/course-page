export default class ModulesList{

    constructor(
        item_selector,
        item_link_selector,
        expand_class = 'expanded',
    ){
        this.items = document.querySelectorAll(item_selector);
        this.item_link_selector = item_link_selector;
        this.expand_class = expand_class;

        this.setEvents();
    }

    setEvents(){
        this.items.forEach(item => {
            const link = item.querySelector(this.item_link_selector);

            link.addEventListener('click', () => {

                item.classList.toggle(this.expand_class);
            })
        })
    }

}
