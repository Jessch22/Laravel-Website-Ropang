document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');
    const contents = document.querySelectorAll('.content');

    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);

            // Remove active class from all menu items
            menuItems.forEach(menu => menu.classList.remove('active'));

            // Add active class to clicked menu item
            this.classList.add('active');

            // Hide all contents
            contents.forEach(content => content.classList.remove('active'));

            // Show target content
            document.getElementById(targetId).classList.add('active');
        });
    });

    // Show default content (home)
    document.getElementById('home').classList.add('active');
});


