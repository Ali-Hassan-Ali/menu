<script type="text/javascript">
	$(document).on('click', '#add-item', function(e) {
		e.preventDefault();

		let namear = "{{ trans('products.name_ar') }}";
		let nameen = "{{ trans('products.name_en') }}";

		let html = `<tr>
	                    <th scope="row">
	                        <button class="btn btn-danger remove-item" data-eir-no="">
	                            <i class="fa fa-remove"></i>
	                        </button>
	                    </th>
	                    <td>
	                        <input type="text" name="item_name_en[]" 
	                        class="form-control" required autofocus placeholder="${nameen}">
	                    </td>
	                    <td>
	                        <input type="text" name="item_name_ar[]" 
	                        class="form-control" required autofocus placeholder="${namear}">
	                    </td>
	                </tr>`;	

    	$('#append-item').append(html);

	});//end of ajax

    $(document).on('click', '.remove-item', function(e) {
        e.preventDefault();

        $(this).closest('tr').remove();

    });//end of click remove-form-request-part
</script>