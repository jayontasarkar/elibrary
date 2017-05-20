<table class="table table-bordered table-striped table-hover dataTable datatable">
    <thead>
        <tr class="active">
        	<th style="width: 4%;">#</th>
            <th style="width: 25%;">Author Name</th>
            <th style="width: 45%;">Biography</th>
            <th style="width: 8%;">Nationality</th>
            <th style="width: 8%;">Copies</th>
            <th style="width: 5%;">Edit</th>
            <th style="width: 5%;">Show</th>
        </tr>
    </thead>
    <tbody>
    @if(count($authors))
    @foreach($authors->load('books') as $key => $author)
        <tr>
        	<td>{{ $key + 1 }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->biography ? : 'no biography provided.' }}</td>
            <td>{{ $author->nationality == 1 ? 'Bangladeshi' : 'Foreign' }}</td>
            <td>{{ count($author->books) }}</td>
            <td>
                <a class="btn btn-info btn-xs edit-btn" href="{{ url('authors/' . $author->id . '/edit') }}">
                    <i class="material-icons">mode_edit</i>
                    <span>Edit</span>
                </a>
            </td>
            <td>
                <a href="{{ url('authors/' . $author->id) }}" class="btn btn-xs bg-blue-grey waves-effect">
                    <i class="material-icons">zoom_in</i> Show
                </a>
            </td>
        </tr>
    @endforeach  
    @else
        <tr>
            <td colspan="6" class="text-center" style="font-size: large;">no author found in system.</td>
        </tr>
    @endif  
    </tbody>
</table>