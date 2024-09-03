<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>
    <!-- Inclua o Bootstrap para estilização rápida -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Create Customer</h1>
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    <!-- Formulário de criação de cliente -->
    <form action="{{ route('customers.createCustomer') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <h2 class="mt-5">Customers</h2>
    @if (isset($customers))
        @if (count($customers) === 0)
        <p>No customers found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->getName() }}</td>
                            <td>{{ $customer->getEmail() }}</td>
                            <td>{{ $customer->getPhone() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        @endif
</div>
</div>
</body>
</html>
