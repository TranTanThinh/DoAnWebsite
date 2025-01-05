@extends('Dashboard.layouts.app')
@section('main')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="margin-top: 120px;">
                <div class="d-flex justify-content-end mb-3">
                     
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h4 class="card-title">Danh sách liên hệ</h4>
                    <table class="display table table-striped table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th> <!-- Column for actions -->
                        </tr>
                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>{{ $contact->updated_at }}</td>
                            
                            <!-- Nút chỉnh sửa -->
                            <<td>
                                <!-- Group both icons together in a div or span -->
                                <div class="d-flex justify-content-start">
                                    
                                    <!-- Nút chỉnh sửa -->
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm me-2">
                                        <i class="fa fa-edit"></i> <!-- Biểu tượng chỉnh sửa -->
                                    </a>
                            
                                    <!-- Nút xóa -->
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> <!-- Biểu tượng xóa -->
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

@endsection
