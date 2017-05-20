<table class="table table-bordered table-striped table-hover dataTable datatable">
    <thead>
        <tr class="active">
        	<th>Book Title</th>
            <th>Author Name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Borrow Date</th>
            <th>Copy </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @if(count($books))
    @foreach($books as $key => $book)
        <tr>
        	<td>{{ $book->book->title }}</td>
            <td>{{ $book->book->author->name ? : 'no author.' }}</td>
            <td>{{ $book->book->category->title ? : 'no category' }}</td>
            <td>{{ $book->book->location ? : 'no location' }}</td>
            <td>{{ $book->borrow_date->format('M d, Y') }}</td>
            <td>{{ $book->copies }}</td>
            <td>
                <a class="btn btn-info btn-xs edit-btn" href="{{ url('return-books/' . $book->id) }}">
                    <i class="material-icons">mode_edit</i>
                    <span>Return</span>
                </a>
            </td>
        </tr>
    @endforeach  
    @else
        <tr>
            <td colspan="7" class="text-center" style="font-size: large;">no book to return for this member.</td>
        </tr>
    @endif  
    </tbody>
</table>