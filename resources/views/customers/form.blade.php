<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
</div>
<div class="pb-3">{{ $errors->first('name') }}</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
</div>
<div class="pb-3">{{ $errors->first('email') }}</div>

<div class="form-group pb-3">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>

        @foreach ($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach

    </select>
</div>

<div class="form-group pb-3">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        <option value="" disabled>Select a company</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}" {{ $company->id == $customer->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
        @endforeach
    </select>
</div>


<button type="submit" class="btn btn-primary">Save customer</button>