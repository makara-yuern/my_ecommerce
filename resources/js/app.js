import './bootstrap';

import Alpine from 'alpinejs';
import jQuery from 'jquery';
import swal from 'sweetalert2';
import select2 from 'select2';
import flatpickr from 'flatpickr';

import "select2/dist/css/select2.css";
import "flatpickr/dist/themes/light.css";

window.Alpine = Alpine;

Alpine.start();

window.$ = jQuery;
select2();

window.Swal = swal;

window.flatpickr = flatpickr;