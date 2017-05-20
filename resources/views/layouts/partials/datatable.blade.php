<script type="text/javascript">
	$(document).ready(function() {
		$('.datatable').DataTable({
            "iDisplayLength": 40,
            "pagingType": "full_numbers",
	        dom: 'Bfrtip',
	        responsive: true,
	        "bSort": false,
	        "buttons": [
                {
                    extend: 'pdfHtml5',
                    title: "{{ $heading . ' (' . date('M d, Y') . ')' }}",
                    exportOptions: {
                        columns: [ {{ $columns }} ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: "{{ $heading }}",
                    exportOptions: {
                        columns: [ {{ $columns }} ]
                    }
                },
                {
                    extend: 'print',
		            title: "{{ $heading }}",
                    exportOptions: {
                        columns: [ {{ $columns }} ],
                        modifier: {
		                    page: 'current'
		                }
                    }
                }
            ]  
	    });
	});
</script>