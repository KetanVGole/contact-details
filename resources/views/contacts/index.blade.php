@extends('layout')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h2>Contacts List</h2>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('contacts.create') }}" style="float: right" class="btn btn-primary">Add Contact</a>
                </div>
            </div>
        </div>
        <div class="card-header">
            <form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" name="file" accept=".xml" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" style="float: right;" class="btn btn-success">Import XML</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table  id="contactsTable" class="table table-success table-striped">
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                @foreach($contacts as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>+90 - {{ $contact->phone }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-3">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
<style>
    .w-5.h-5{
        width: 20px;
    }
</style>
@endsection

