<table class="table table-bordered table-striped table-hover dataTable datatable">
    <thead>
        <tr class="active">
        	<th>#</th>
            <th>Category Title</th>
            <th>Description</th>
            <th>Books</th>
            <th>Edit</th>
            <th>Show</th>
        </tr>
    </thead>
    <tbody>
    @if(count($categories))
    @foreach($categories->load('books') as $key => $category)
        <tr>
        	<td>{{ $key + 1 }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description ? : 'no description provided.' }}</td>
            <td>{{ count($category->books) }}</td>
            <td>
                <button class="btn btn-info btn-xs edit-btn" 
                    data-id="{{ $category->id }}"
                    data-title="{{ $category->title }}" 
                    data-desc="{{ $category->description }}"
                >
                    <i class="material-icons">mode_edit</i>
                    <span>Edit</span>
                </button>
            </td>
            <td>
                <a href="{{ url('categories/' . $category->id) }}" class="btn btn-xs bg-blue-grey waves-effect">
                    <i class="material-icons">zoom_in</i> Show
                </a>
            </td>
        </tr>
    @endforeach  
    @else
        <tr>
            <td colspan="4" class="text-center" style="font-size: large;">no categories found in system.</td>
        </tr>
    @endif  
    </tbody>
</table>