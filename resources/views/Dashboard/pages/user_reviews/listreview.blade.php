@extends('Dashboard.layouts.app')

@section('main')
<div class="container">
    <h1 class="my-4">Danh sách User Reviews</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Ordered Product ID</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->userID }}</td>
                    <td>{{ $review->orderedProductID }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td>{{ $review->updated_at }}</td>
                    <td>
                        <form action="{{ route('user_reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> <!-- Biểu tượng xóa -->
                            </button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
