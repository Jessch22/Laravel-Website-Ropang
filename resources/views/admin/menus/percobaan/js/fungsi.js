// fungsi page move
document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.menu-item');
    const contents = document.querySelectorAll('.content-section');

    menuItems.forEach(menu => {
        menu.addEventListener('click', function(event) {
            event.preventDefault();
            // Remove active class from all menu items
            menuItems.forEach(menu => menu.classList.remove('active'));

            // Add active class to clicked menu item
            this.classList.add('active');

            // Hide all contents
            contents.forEach(content => content.style.display = 'none');

            // Show target content
            const targetId = this.getAttribute('href').substring(1);
            document.getElementById(targetId).style.display = 'block';
        });
    });

    // Show default content (home)
    document.getElementById('home').style.display = 'block';

    // Example menu data
    let menu = [
        { name: 'Pizza', description: 'Delicious cheese pizza', price: '$10', category: 'Main Course' },
        { name: 'Salad', description: 'Fresh vegetable salad', price: '$5', category: 'Appetizer' },
        { name: 'Ice Cream', description: 'Vanilla ice cream with chocolate syrup', price: '$3', category: 'Dessert' }
    ];

    const menuTableBody = document.getElementById('menu-table-body');

    function renderMenuTable() {
        menuTableBody.innerHTML = '';
        menu.forEach((item, index) => {
            const row = document.createElement('tr');

            const cellNo = document.createElement('td');
            cellNo.textContent = index + 1;
            row.appendChild(cellNo);

            const cellName = document.createElement('td');
            cellName.textContent = item.name;
            row.appendChild(cellName);

            const cellDescription = document.createElement('td');
            cellDescription.textContent = item.description;
            row.appendChild(cellDescription);

            const cellPrice = document.createElement('td');
            cellPrice.textContent = item.price;
            row.appendChild(cellPrice);

            const cellCategory = document.createElement('td');
            cellCategory.textContent = item.category;
            row.appendChild(cellCategory);

            const cellAction = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'delete-btn';
            deleteBtn.onclick = function() {
                deleteMenuItem(index);
            };
            cellAction.appendChild(deleteBtn);
            row.appendChild(cellAction);

            menuTableBody.appendChild(row);
        });
    }

    function addMenuItem() {
        const name = prompt('Enter menu name:');
        const description = prompt('Enter menu description:');
        const price = prompt('Enter menu price:');
        const category = prompt('Enter menu category:');
        if (name && description && price && category) {
            menu.push({ name, description, price, category });
            renderMenuTable();
        }
    }

    function deleteMenuItem(index) {
        menu.splice(index, 1);
        renderMenuTable();
    }

    renderMenuTable();

    // Example user data
    let users = [
        { name: 'John Doe', role: 'Admin', purchases: 5 },
        { name: 'Jane Smith', role: 'User', purchases: 3 }
    ];

    const userTableBody = document.getElementById('user-table-body');

    function renderUserTable() {
        userTableBody.innerHTML = '';
        users.forEach((user, index) => {
            const row = document.createElement('tr');

            const cellNo = document.createElement('td');
            cellNo.textContent = index + 1;
            row.appendChild(cellNo);

            const cellName = document.createElement('td');
            cellName.textContent = user.name;
            row.appendChild(cellName);

            const cellRole = document.createElement('td');
            cellRole.textContent = user.role;
            row.appendChild(cellRole);

            const cellPurchases = document.createElement('td');
            cellPurchases.textContent = user.purchases;
            row.appendChild(cellPurchases);

            const cellAction = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'delete-btn';
            deleteBtn.onclick = function() {
                deleteUser(index);
            };
            cellAction.appendChild(deleteBtn);
            row.appendChild(cellAction);

            userTableBody.appendChild(row);
        });
    }

    function addUser() {
        const name = prompt('Enter user name:');
        const role = prompt('Enter user role:');
        const purchases = prompt('Enter number of purchases:');
        if (name && role && purchases) {
            users.push({ name, role, purchases: parseInt(purchases, 10) });
            renderUserTable();
        }
    }

    function deleteUser(index) {
        users.splice(index, 1);
        renderUserTable();
    }

    renderUserTable();

    // Example reservation data
    let reservations = [
        { customerName: 'Alice Johnson', date: '2024-06-20', time: '18:00', guests: 2 },
        { customerName: 'Bob Williams', date: '2024-06-21', time: '19:00', guests: 4 }
    ];

    const reservationTableBody = document.getElementById('reservation-table-body');

    function renderReservationTable() {
        reservationTableBody.innerHTML = '';
        reservations.forEach((reservation, index) => {
            const row = document.createElement('tr');

            const cellNo = document.createElement('td');
            cellNo.textContent = index + 1;
            row.appendChild(cellNo);

            const cellCustomerName = document.createElement('td');
            cellCustomerName.textContent = reservation.customerName;
            row.appendChild(cellCustomerName);

            const cellDate = document.createElement('td');
            cellDate.textContent = reservation.date;
            row.appendChild(cellDate);

            const cellTime = document.createElement('td');
            cellTime.textContent = reservation.time;
            row.appendChild(cellTime);

            const cellGuests = document.createElement('td');
            cellGuests.textContent = reservation.guests;
            row.appendChild(cellGuests);

            const cellAction = document.createElement('td');
            const deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Delete';
            deleteBtn.className = 'delete-btn';
            deleteBtn.onclick = function() {
                deleteReservation(index);
            };
            cellAction.appendChild(deleteBtn);
            row.appendChild(cellAction);

            reservationTableBody.appendChild(row);
        });
    }

    function addReservation() {
        const customerName = prompt('Enter customer name:');
        const date = prompt('Enter reservation date (YYYY-MM-DD):');
        const time = prompt('Enter reservation time (HH:MM):');
        const guests = prompt('Enter number of guests:');
        if (customerName && date && time && guests) {
            reservations.push({ customerName, date, time, guests: parseInt(guests, 10) });
            renderReservationTable();
        }
    }

    function deleteReservation(index) {
        reservations.splice(index, 1);
        renderReservationTable();
    }

    renderReservationTable();
});