import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


if (document.querySelector('.siderbar')) {
    let btn = document.getElementById("btn_siderbar");
    let siderbar = document.querySelector('.siderbar');

    btn.onclick = function () {
        siderbar.classList.toggle("active")
    }
}

