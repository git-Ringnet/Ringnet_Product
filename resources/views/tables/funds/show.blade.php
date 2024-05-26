<div class="container">
    <h1>Fund Details</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $fund->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $fund->description }}</p>
            <p><strong>Amount:</strong> {{ $fund->amount }}</p>
            <p><strong>Bank Name:</strong> {{ $fund->bank_name }}</p>
            <p><strong>Bank Account Number:</strong> {{ $fund->bank_account_number }}</p>
            <p><strong>Bank Account Holder:</strong> {{ $fund->bank_account_holder }}</p>
            <p><strong>Start Date:</strong> {{ $fund->start_date }}</p>
            <p><strong>End Date:</strong> {{ $fund->end_date }}</p>
            <a href="{{ route('funds.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
