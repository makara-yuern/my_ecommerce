flatpickr('.datetime', {});

flatpickr('.time', {
    enableTime: true,
    noCalendar : true,
    dateFormat: 'H:i'
});

$(".select2").select2({
    tags : true,
    multiple: true,
    placeholder : '',
})
