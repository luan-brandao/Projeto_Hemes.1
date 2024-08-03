// public/js/register.js

document.addEventListener('DOMContentLoaded', function() {
    var driverCheckbox = document.getElementById('driver');
    var driverFields = document.getElementById('driver-fields');

    driverCheckbox.addEventListener('change', function() {
        if (driverCheckbox.checked) {
            driverFields.style.display = 'block';
        } else {
            driverFields.style.display = 'none';
        }
    });
});
