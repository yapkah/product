@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Categories</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
        + Add Category
    </a>

    <form method="POST" action="{{ route('categories.bulk-delete') }}">
    @csrf

    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="50">
                    <input type="checkbox" onclick="toggle(this)">
                </th>
                <th>Name</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>
                        <input type="checkbox" name="ids[]" value="{{ $category->id }}">
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}"
                        class="btn btn-sm btn-warning">Edit</a>

                        <button type="button"
                                class="btn btn-sm btn-danger"
                                onclick="if(confirm('Delete this category?')) document.getElementById('delete-form-{{ $category->id }}').submit()">
                            Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No categories found</td>
                </tr>
            @endforelse
        </tbody>
        </table>

        <button type="submit"
                class="btn btn-danger"
                onclick="return confirm('Delete selected categories?')">
            Bulk Delete
        </button>
    </form>

    @foreach($categories as $category)
    <form id="delete-form-{{ $category->id }}"
        method="POST"
        action="{{ route('categories.destroy', $category->id) }}"
        style="display:none">
        @csrf
        @method('DELETE')
    </form>
    @endforeach

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>

<script>
function toggle(source) {
    checkboxes = document.getElementsByName('ids[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = source.checked;
    }
}
</script>
@endsection
