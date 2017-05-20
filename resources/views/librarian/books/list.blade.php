<table class="table table-bordered table-striped table-hover dataTable datatable">
    <thead>
        <tr class="active">
        	<th style="width: 4%;">#</th>
            <th style="width: 20%;">Book Title</th>
            <th style="width: 20%;">Author Name</th>
            <th style="width: 15%;">Category</th>
            <th style="width: 15%;">Location</th>
            <th style="width: 10%;">Total </th>
            <th style="width: 10%;">Available</th>
            <th style="width: 6%;">Action</th>
        </tr>
    </thead>
    <tbody>
    @if(count($books))
    @foreach($books as $key => $book)
        <tr>
        	<td>{{ $key + 1 }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author->name ? : 'no author.' }}</td>
            <td>{{ $book->category->title ? : 'no category' }}</td>
            <td>{{ $book->location ? : 'no location' }}</td>
            <td>{{ $book->total_copy }}</td>
            <td>{{ $book->available_copy }}</td>
            <td>
                <a class="btn btn-info btn-xs edit-btn" href="{{ url('books/' . $book->id . '/edit') }}">
                    <i class="material-icons">mode_edit</i>
                    <span>Edit</span>
                </a>
            </td>
        </tr>
    @endforeach  
    @else
        <tr>
            <td colspan="5" class="text-center" style="font-size: large;">no book found in system.</td>
        </tr>
    @endif  
    </tbody>
</table>