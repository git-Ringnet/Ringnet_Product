<div class="container">
    <h1>Create Fund</h1>
    <form action="{{ route('funds.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" name="bank_name" id="bank_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="bank_account_number">Bank Account Number</label>
            <input type="text" name="bank_account_number" id="bank_account_number" class="form-control">
        </div>
        <div class="form-group">
            <label for="bank_account_holder">Bank Account Holder</label>
            <input type="text" name="bank_account_holder" id="bank_account_holder" class="form-control">
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
