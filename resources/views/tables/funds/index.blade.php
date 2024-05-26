<div class="container">
    <h1>Funds</h1>
    <a href="{{ route('funds.create') }}" class="btn btn-primary">Create Fund</a>
    @if (session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif
    <table class="table mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Start Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funds as $fund)
                <tr>
                    <td>{{ $fund->id }}</td>
                    <td>{{ $fund->name }}</td>
                    <td>{{ $fund->amount }}</td>
                    <td>{{ $fund->start_date }}</td>
                    <td>
                        <a href="{{ route('funds.show', $fund->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('funds.edit', $fund->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('funds.destroy', $fund->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
