window.onload = function() {
    const invoiceContent = document.getElementById('invoice-content');
    const invoiceData = JSON.parse(localStorage.getItem('invoiceData'));
    const subtotal = localStorage.getItem('invoiceSubtotal');
    const shipping = localStorage.getItem('invoiceShipping');
    const total = localStorage.getItem('invoiceTotal');

    const header = `
        <div class="invoice-header">
            <h1>{user}</h1>
            <div class="contact-info">
                Jl. Tj. Duren Utara IIIIF No.32,
                <p>Kec. Grogol Pertamburan, Jakarta barat</p>
                <p>+62 8218 8517 436</p>
                <p>marketing@rittertalent.com</p>
            </div>
        </div>
    `;
    invoiceContent.insertAdjacentHTML('beforeend', header);

    const invoiceInfo = `
        <div class="invoice-info">
            <p>Invoice To: Mrs{user} </p>
            <p>Due Date: 27-Juni-2024</p>
            <p>Invoice Number: 001</p>
        </div>
    `;
    invoiceContent.insertAdjacentHTML('beforeend', invoiceInfo);

    const tableHeader = `
        <div class="invoice-items">
            <table>
                <thead>
                    <tr>
                        <th>Item Description</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="invoice-items-body">
                </tbody>
            </table>
        </div>
    `;
    invoiceContent.insertAdjacentHTML('beforeend', tableHeader);

    let invoiceItemsBody = '';
    invoiceData.forEach(item => {
        invoiceItemsBody += `
            <tr>
                <td>${item.description}</td>
                <td>${item.quantity}</td>
                <td>Rp. ${item.unitPrice}</td>
                <td>Rp. ${item.total}</td>
            </tr>
        `;
    });
    document.getElementById('invoice-items-body').innerHTML = invoiceItemsBody;

    const footer = `
        <div class="invoice-footer">
            <div class="payment-method">
                <p>Payment Method</p>
                <p>BANK TRANSFER CODE: 38-46-4792-7482</p>
                <p>ONLINE TRANSFER CODE: 13-64-2637-7382</p>
            </div>
            <div class="totals">
                <p>SUBTOTAL: ${subtotal}</p>
                <p>SHIPPING: ${shipping}</p>
                <p>TOTAL: ${total}</p>
            </div>
        </div>
    `;
    invoiceContent.insertAdjacentHTML('beforeend', footer);
}

function printInvoice() {
    window.print();
}
