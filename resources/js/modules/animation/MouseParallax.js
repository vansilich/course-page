export default class MouseParallax{

    constructor(
        element_selector,
        x_factor = 1,
        y_factor = 1,
    ){
        const items = document.querySelectorAll(element_selector);

        items.forEach(item => {

            window.addEventListener('mousemove', event => {
                let x = event.clientX / window.innerWidth;
                let y = event.clientY / window.innerHeight;

                x *= - x_factor * 20;
                y *= - y_factor * 20;

                item.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
            })
        });

    }
}
