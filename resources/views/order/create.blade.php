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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Sales Tracker</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{ route('customers.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Customers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('products.create') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Orders</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
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
            <form action="{{ route('orders.createOrder') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer" class="form-label">Customer</label>
                    <select class="form-control" name="customerId" id="customerId">
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
                    <label for="paymentMethod" class="form-label">Payment Method</label>
                    <select class="form-control" name="paymentMethod" id="paymentMethod">
                        <option value="___">Selecionar</option>
                        <option value="cash">Dinheiro</option>
                        <option value="Card">Cartão</option>
                    </select>
                </div>
                <div class="mb-3">
                    <h3>Items</h3>
                    <hr/>
                    <div class="form-group">
                        <label for="product_id" class="form-label">Product:</label>
                        <select class="form-label" name="product_id" id="product_id">
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

                    <div id="orderItems">
                        <!-- Dynamic product quantity fields will be added here -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productSelect = document.getElementById('product_id');
        const orderItems = document.getElementById('orderItems');

        productSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const productId = selectedOption.value;
            const productName = selectedOption.getAttribute('data-name');
            const productPrice = selectedOption.getAttribute('data-price');

            // Verificar se o produto já está na lista
            const existingProduct = document.querySelector(`.product-row[data-product-id="${productId}"]`);

            if (productId && productId !== '___' && !existingProduct) {
                // Criar uma linha de produto se ainda não existe
                const row = document.createElement('div');
                row.className = 'product-row';
                row.setAttribute('data-product-id', productId);

                // ID do produto (input hidden para ser enviado)
                const productIdInput = document.createElement('input');
                productIdInput.setAttribute('type', 'hidden');
                productIdInput.setAttribute('name', 'orderItems[' + productId + '][productId]');
                productIdInput.setAttribute('value', productId);
                row.appendChild(productIdInput);

                // Nome do produto
                const nameDiv = document.createElement('div');
                nameDiv.textContent = `Name: ${productName}`;
                row.appendChild(nameDiv);

                // Preço do produto
                const priceDiv = document.createElement('div');
                priceDiv.textContent = `Price: $${parseFloat(productPrice).toFixed(2)}`;
                row.appendChild(priceDiv);

                // Quantidade (agora chamado "amount")
                const amountDiv = document.createElement('div');
                const amountInput = document.createElement('input');
                amountInput.setAttribute('type', 'number');
                amountInput.setAttribute('name', 'orderItems[' + productId + '][amount]');
                amountInput.setAttribute('min', '1');
                amountInput.setAttribute('value', '1');
                amountInput.className = 'form-control';
                amountDiv.textContent = 'Amount: ';
                amountDiv.appendChild(amountInput);
                row.appendChild(amountDiv);

                // Botão de remover
                const removeBtnDiv = document.createElement('div');
                const removeBtn = document.createElement('button');
                removeBtn.className = 'remove-btn';
                removeBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
                removeBtn.addEventListener('click', function () {
                    row.remove();
                });
                removeBtnDiv.appendChild(removeBtn);
                row.appendChild(removeBtnDiv);

                // Adicionar a linha ao orderItems
                orderItems.appendChild(row);
            } else if (existingProduct) {
                alert('Este produto já foi adicionado à lista.');
            }
        });
    });
</script>
</html>

