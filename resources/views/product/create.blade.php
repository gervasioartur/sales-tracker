<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
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
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            @include('components.sidebar')
        </div>
        <div class="p-5 m-5 col py-3">
            <h1>Create Product</h1>
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
            <form action="{{ route('products.createProduct') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <input type="desc" class="form-control" id="text" name="desc" value="{{ old('desc') }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>

            <h2 class="mt-5">Products</h2>
            @if (isset($products))
                @if (count($products) === 0)
                    <p>No customers found.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $prodcut)
                            <tr>
                                <td>{{ $prodcut->getName() }}</td>
                                <td>{{ $prodcut->getDesc() }}</td>
                                <td>R${{ $prodcut->getPrice() }}</td>
                                <td><button class="btn btn-success"><i class="fas fa-eye"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>
</div>
</body>
</html>

