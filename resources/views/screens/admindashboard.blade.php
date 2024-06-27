<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials-admin.header')
</head>
<body>
    @include('partials-admin.navbar')
    <div class="content" id="content">
        @include('partials-admin.home')
        @include('partials-admin.menus')
        @include('partials-admin.users')
        @include('partials-admin.reservation')
        @include('partials-admin.contact')
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('.menu-item');
            const contents = document.querySelectorAll('.content-section');

            //MENU
            menuItems.forEach(menu => {
                menu.addEventListener('click', function(event) {
                    event.preventDefault();
                    menuItems.forEach(menu => menu.classList.remove('active'));
                    this.classList.add('active');
                    contents.forEach(content => content.style.display = 'none');
                    const targetId = this.getAttribute('href').substring(1);
                    document.getElementById(targetId).style.display = 'block';
                });
            });

            // USER
            document.getElementById('home').style.display = 'block';
        });
    </script>
</body>
</html>
