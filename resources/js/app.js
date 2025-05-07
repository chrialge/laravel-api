import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
import flatpickr from 'flatpickr';

import {
    Italian
} from "flatpickr/dist/l10n/it.js";


if (document.querySelector('.siderbar')) {
    let btn = document.getElementById("btn_siderbar");
    let siderbar = document.querySelector('.siderbar');

    btn.onclick = function () {
        siderbar.classList.toggle("active")
    }
}

if (document.getElementById("start_date")) {

    flatpickr("#start_date", {
        locale: Italian,
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d/m/Y",
        allowInput: true,
    });
}

if (document.getElementById("finish_date")) {
    flatpickr("#finish_date", {
        locale: Italian,
        dateFormat: "Y-m-d",
        altInput: true,
        altFormat: "d/m/Y",
        allowInput: true,
    });
}

