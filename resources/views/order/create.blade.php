<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <!-- Inclua o Bootstrap para estilização rápida -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para o menu lateral */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            display: block;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .product-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 8px;
        }

        .product-row div {
            margin-right: 10px;
        }

        .remove-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        #paymentTypeContainer {
            display: none;
        }

        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #installmentDetails {
            display: none;
            margin-top: 10px;
        }

        #paymentSummary {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-top: 18px;
            align-items: flex-start;
        }

        #paymentDetails {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .paymentDetailsDiv {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-row{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }
        .instalmentItem {
            width: 100%;
            display: flex;
            flex-direction: row;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            @include('components.sidebar')
        </div>
        <div class="p-5 m-5 col py-3">
            <h1>Create Order</h1>
            @if (isset($success))
                <div class="alert alert-success">
                    {{ $success }}
                </div>
            @endif

            @if (isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif

            <!-- Formulário de criação de cliente -->
            <form id="orderForm" action="{{ route('orders.createOrder') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer" class="form-label">Customer</label>
                    <select class="custom-select" name="customerId" id="customerId">
                        @if (isset($customers))
                            <option value="___">Selecionar</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->getId() }}">{{ $customer->getName() }}</option>
                            @endforeach
                        @else
                            <option value="___">Sem Dados por apresentar</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <h3>Items</h3>
                    <hr/>
                    <div class="form-group">
                        <label for="productId" class="form-label">Product:</label>
                        <select class="custom-select" name="productId" id="productId">
                            @if (isset($products))
                                <option value="___">Selecionar</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->getId() }}"
                                            data-name="{{ $product->getName() }}"
                                            data-price="{{ $product->getPrice() }}">
                                        {{ $product->getName() }}
                                    </option>
                                @endforeach
                            @else
                                <option value="___">Sem Dados por apresentar</option>
                            @endif
                        </select>
                    </div>

                    <div id="orderItems" class="bg-info bg-gradient">
                        <!-- Dynamic product quantity fields will be added here -->
                    </div>
                </div>

                <div class="mb-3">
                    <h3>Payment</h3>
                    <hr/>

                    <div class="form-group">
                        <label for="paymentMethod" class="form-label">Payment Method</label>
                        <select class="custom-select" name="paymentMethod" id="paymentMethod">
                            <option value="___">Selecionar</option>
                            <option value="cash">Dinheiro</option>
                            <option value="card">Cartão</option>
                        </select>

                        <span id="paymentTypeContainer">
                            <label for="paymentType" class="form-label">Type:</label>
                            <select class="custom-select" name="paymentType" id="paymentType">
                                <option value="___">Selecionar</option>
                                <option value="cash">À vista</option>
                                <option value="card">Parcelado</option>
                            </select>
                        </span>
                    </div>

                    <div id="installmentDetails" class="form-group p-2">
                        <label for="installments" class="form-label">Número de Parcelas:</label>
                        <select id="installments" name="installments" class="custom-select">
                            <!-- As opções serão adicionadas dinamicamente -->
                        </select>
                        <div class="form-group m-3 p-3">
                            <label for="installmentDates" class="form-label">Data de Pagamento das Parcelas:</label>
                            <input type="date" id="installmentDates" name="installmentDates[]" class="form-control">
                        </div>
                    </div>

                    <div id="paymentSummary" class="form-group alert-success">
                        <h3>Resumo do Pagamento</h3>
                        <hr/>
                        <div id="paymentDetails" class="paymentDetailsDiv">
                            <!-- Informações de pagamento serão inseridas aqui -->
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            <h2 class="mt-5">Orders</h2>
            @if (isset($orders))
                @if (count($orders) === 0)
                    <p>No customers found.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Payment Method</th>
                            <th>Payment Type</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->getId() }}</td>
                                <td>{{ $order->getCustomerName() }}</td>
                                <td>{{ $order->getOrderDate()->format('d/m/Y H:i') }}</td>
                                <td>{{ $order->getPaymentMethod() }}</td>
                                <td>{{ $order->getPaymentType() }}</td>
                                <td>R$ {{ $order->getTotal() }}</td>
                                <td><button  class="openModalBtn btn btn-success"><i class="fas fa-eye"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div id="myModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h2>Order</h2>
                            <hr/>
                            <div>
                                <div>
                                    <div>
                                        <label><b>Customer :</b></label>
                                        <span>Joao da silva campos</span>
                                    </div>
                                    <div>
                                        <label><b>Oder date :</b></label>
                                        <span>Joao da silva campos</span>
                                    </div>
                                    <div>
                                        <label><b>Payment Method :</b></label>
                                        <span>Joao da silva campos</span>
                                    </div>
                                    <div>
                                        <label><b>Payment Type :</b></label>
                                        <span>Joao da silva campos</span>
                                    </div>
                                    <div>
                                        <label><b>Total :</b></label>
                                        <span>Joao da silva campos</span>
                                    </div>
                                </div>
                                <h2>Installments</h2>
                                <hr/>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Obter o modal
    var modal = document.getElementById("myModal");

    // Obter o botão que abre o modal
    var btn = document.getElementById("openModalBtn");

    // Obter o elemento <span> que fecha o modal
    var span = document.getElementsByClassName("close")[0];

    // Quando o usuário clica no botão, abre o modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Quando o usuário clica em <span> (x), fecha o modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Quando o usuário clica fora do modal, fecha o modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }


    document.addEventListener('DOMContentLoaded', function () {
        const paymentMethodSelect = document.getElementById('paymentMethod');
        const paymentTypeContainer = document.getElementById('paymentTypeContainer');
        const paymentTypeSelect = document.getElementById('paymentType');
        const installmentDetails = document.getElementById('installmentDetails');
        const installmentsSelect = document.getElementById('installments');
        const installmentDatesInput = document.getElementById('installmentDates');
        const totalDiv = document.createElement('div');
        totalDiv.id = 'total';
        totalDiv.textContent = 'Total: $0.00';


        paymentMethodSelect.addEventListener('change', function () {
            if (this.value === 'card') {
                paymentTypeContainer.style.display = 'block';
            } else {
                paymentTypeContainer.style.display = 'none';
                installmentDetails.style.display = 'none';
            }
        });

        paymentTypeSelect.addEventListener('change', function () {
            if (this.value === 'card') {
                installmentDetails.style.display = 'flex';
                updateInstallmentDetails();
            } else {
                installmentDetails.style.display = 'none';
            }
        });

        installmentsSelect.addEventListener('change', function () {
            updatePaymentSummary();
        });

        function updateInstallmentDetails() {
            // Calcule o número máximo de parcelas com base no total
            const total = parseFloat(totalDiv.textContent.replace('Total: $', '')) || 0;
            const parcelaMinima = 50; // valor mínimo por parcela
            const maxInstallmentsByTotal = Math.floor(total / parcelaMinima);
            const maxInstallments = Math.min(maxInstallmentsByTotal, 12); // Limite máximo de 12 parcelas

            // Limpe as opções anteriores
            installmentsSelect.innerHTML = '';
            for (let i = 1; i <= maxInstallments; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                installmentsSelect.appendChild(option);
            }
        }

        const productSelect = document.getElementById('productId');
        const orderItems = document.getElementById('orderItems');
        orderItems.parentElement.appendChild(totalDiv)


        productSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const productId = selectedOption.value;
            const productName = selectedOption.getAttribute('data-name');
            const productPrice = parseFloat(selectedOption.getAttribute('data-price'));

            const existingProduct = document.querySelector(`.product-row[data-product-id="${productId}"]`);

            if (productId && productId !== '___' && !existingProduct) {
                const row = document.createElement('div');
                row.className = 'product-row';
                row.setAttribute('data-product-id', productId);

                const productIdInput = document.createElement('input');
                productIdInput.setAttribute('type', 'hidden');
                productIdInput.setAttribute('name', `orderItems[${productId}][productId]`);
                productIdInput.setAttribute('value', productId);
                row.appendChild(productIdInput);

                const productDiv = document.createElement('div');
                const productDivInput = document.createElement('input');
                productDivInput.setAttribute('type', 'number');
                productDivInput.setAttribute('name', `orderItems[${productId}][productId]`);
                productDivInput.setAttribute('value', productId);
                productDivInput.className = 'form-control';
                productDiv.textContent = 'ProductId: ';
                productDiv.style.display = 'none';
                productDiv.appendChild(productDivInput);
                row.appendChild(productDiv);

                const nameDiv = document.createElement('span');
                nameDiv.style.width='150px'
                nameDiv.textContent = `${productName}`;
                row.appendChild(nameDiv);

                const priceDiv = document.createElement('div');
                priceDiv.textContent = `Price: $${productPrice.toFixed(2)}`;
                row.appendChild(priceDiv);

                const amountDiv = document.createElement('div');
                const amountInput = document.createElement('input');
                amountInput.setAttribute('type', 'number');
                amountInput.setAttribute('name', `orderItems[${productId}][amount]`);
                amountInput.setAttribute('min', '1');
                amountInput.setAttribute('value', '1');
                amountInput.className = 'form-control';
                amountInput.addEventListener('input', function () {
                    updateSubtotal(row, productPrice);
                    updateTotal();
                });
                amountDiv.textContent = 'Amount: ';
                amountDiv.appendChild(amountInput);
                row.appendChild(amountDiv);

                const subtotalDiv = document.createElement('div');
                subtotalDiv.className = 'subtotal';
                subtotalDiv.textContent = `Subtotal: $${productPrice.toFixed(2)}`;
                row.appendChild(subtotalDiv);

                const removeBtnDiv = document.createElement('div');
                const removeBtn = document.createElement('button');
                removeBtn.className = 'btn btn-danger';
                removeBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                removeBtn.addEventListener('click', function () {
                    row.remove();
                    updateTotal();
                });
                removeBtnDiv.appendChild(removeBtn);
                row.appendChild(removeBtnDiv);

                orderItems.appendChild(row);
                updateTotal();
            } else if (existingProduct) {
                alert('Este produto já foi adicionado à lista.');
            }
        });

        function updateSubtotal(row, productPrice) {
            const amountInput = row.querySelector('input[name$="[amount]"]');
            const subtotalDiv = row.querySelector('.subtotal');
            const quantity = parseFloat(amountInput.value) || 0;
            const subtotal = quantity * productPrice;
            subtotalDiv.textContent = `Subtotal: $${subtotal.toFixed(2)}`;
        }

        function updateTotal() {
            let total = 0;
            const subtotals = document.querySelectorAll('.subtotal');
            subtotals.forEach(subtotalDiv => {
                const subtotalText = subtotalDiv.textContent.replace('Subtotal: $', '');
                total += parseFloat(subtotalText) || 0;
            });
            totalDiv.textContent = `Total: $${total.toFixed(2)}`;
            updateInstallmentDetails();
            updatePaymentSummary(); // Atualiza o resumo do pagamento

        }

        const paymentSummary = document.getElementById('paymentSummary');
        const paymentDetailsDiv = document.getElementById('paymentDetails');

        function updatePaymentSummary() {
            const total = parseFloat(totalDiv.textContent.replace('Total: $', '')) || 0;
            const installments = parseInt(installmentsSelect.value, 10) || 0;
            const installmentValue = installments > 0 ? (total / installments).toFixed(2) : 0;

            let selectedDate = new Date(installmentDatesInput.value);
            if (isNaN(selectedDate.getTime())) selectedDate = new Date();
            const hiddenInputs = [];

            const existingInputs = document.querySelectorAll('#orderForm input[type="hidden"]');
            existingInputs.forEach(input => input.remove());

            if (installments > 0) {
                paymentDetailsDiv.innerHTML = "";
                paymentDetailsDiv.style.display = 'block';
                for (let i = 1; i <= installments; i++) {
                    const div = document.createElement('div');
                    div.className = `instalmentItem p-2`;
                    if(i%2!=0)  div.className += ` bg-secondary`;
                    div.style.display = 'flex'
                    div.style.flexDirection = 'row'
                    div.style.justifyContent = 'space-between'

                    const instalment = document.createElement('p');
                    instalment.textContent = `Parcela ${i}`;
                    div.appendChild(instalment);

                    let installmentPrice = document.createElement('label');
                    installmentPrice.textContent = installmentValue;
                    div.appendChild(installmentPrice);

                    const dueDate = document.createElement('p');
                    let dueDateAux = new Date(selectedDate);
                    if (i !== 1) dueDateAux.setMonth(dueDateAux.getMonth() + i);
                    dueDate.textContent = dueDateAux.toLocaleDateString();
                    div.appendChild(dueDate);

                    paymentDetailsDiv.appendChild(div);

                    const installmentInput = document.createElement('input');
                    installmentInput.type = 'hidden';
                    installmentInput.name = `installments[${i - 1}][value]`;
                    installmentInput.value = installmentValue;
                    hiddenInputs.push(installmentInput);

                    const dueDateInput = document.createElement('input');
                    dueDateInput.type = 'hidden';
                    dueDateInput.name = `installments[${i - 1}][dueDate]`;
                    dueDateInput.value = dueDateAux.toISOString(); // Use toISOString() para o formato de data ISO
                    hiddenInputs.push(dueDateInput);
                }
                const form = document.getElementById('orderForm');
                hiddenInputs.forEach(input => form.appendChild(input));
            } else {
                paymentDetailsDiv.innerHTML = '';
            }
        }

        updatePaymentSummary();
    });
</script>


</html>

