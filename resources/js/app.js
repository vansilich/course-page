import './bootstrap';

import './pages/3d-compas';

let collapseShow = document.getElementById('collapse-burger-show');

collapseShow.addEventListener('click', function () {
    document.getElementById("collapse-container").style.display = "block";
})

let collapseHide = document.getElementById('collapse-burger-close');

collapseHide.addEventListener('click', function () {
    document.getElementById("collapse-container").style.display = "none";
})
