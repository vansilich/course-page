export const parentByQuerySelector = function(element, parentSelector) {

    // Element.matches() polyfill
    if (!Element.prototype.matches) {
        Element.prototype.matches =
            Element.prototype.matchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector ||
            Element.prototype.oMatchesSelector ||
            Element.prototype.webkitMatchesSelector;
    }

    // Get the closest matching element
    for (; element && element !== document; element = element.parentNode ) {
        if ( element.matches( parentSelector ) ){
            return element;
        }
    }
    return null;
}

export const getBodyScrollTop = function () {
    return window.self.pageYOffset
        || (document.documentElement && document.documentElement.ScrollTop)
        || (document.body && document.body.scrollTop);
}
