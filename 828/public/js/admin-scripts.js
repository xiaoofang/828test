/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    //
// Scripts
//

<!-- 在你的 Blade 模板中引入 jQuery 库 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
    const sortUserBtn = document.querySelector('#sortUserBtn');
    const sortTitleBtn = document.querySelector('#sortTitleBtn');
    const sortTimeBtn = document.querySelector('#sortTimeBtn');

    sortUserBtn.addEventListener('click', event => {
        // Add logic to sort by user
        // Replace the following line with your actual sorting logic
        alert('Sort by user clicked');
    });

    sortTitleBtn.addEventListener('click', event => {
        // Add logic to sort by title
        // Replace the following line with your actual sorting logic
        alert('Sort by title clicked');
    });

    sortTimeBtn.addEventListener('click', event => {
        // Add logic to sort by time
        // Replace the following line with your actual sorting logic
        alert('Sort by time clicked');
    });

});
