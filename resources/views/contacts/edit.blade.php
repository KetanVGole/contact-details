@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-90">
    <div class="card w-50">
        <div class="card-header text-center">
            <h2>Edit Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ $contact->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone:</label>
                    <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('input[name="phone"]').on('input', function () {
            let value = $(this).val();
            value = value.replace(/\D/g, '');
            if (value.length > 10) {
                value = value.substring(0, 10);
            }

            $(this).val(value);
        });
    });
</script>
