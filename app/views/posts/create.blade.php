@section('title')
	New Post
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			{{ Form::open(array('route' => 'posts.store')) }}
				<div class="form-group">
					<label for="title">Title&#42;</label>
					{{ Form::text('title', '', array('autocapitalize' => 'on', 'autofocus' => 'autofocus', 'required' => 'required', 'class' => 'form-control', 'id' => 'title')) }}
				<span class="help-block text-danger">{{ $errors->first('title') }}</span>
				</div>
				<div class="form-group">
					<label for="content">Content&#42;</label>
					{{ Form::textarea('content', '', array('autocapitalize' => 'on', 'required' => 'required', 'class' => 'form-control', 'id' => 'content')) }}
					<span class="help-block text-danger">{{ $errors->first('content') }}</span>
				</div>

				{{-- Post Category --}}
				<div class="form-group">
					
					{{-- # place the post category dropdown here --}}

					{{-- Uncomment
					<p class="help-block">
						<a href="#" data-toggle="modal" data-target="#categoryNameModal">
							Add New Category
						</a>
					</p>
					--}}
				</div>

				{{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</div>
	</div>
</div>

<div id="categoryNameModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
        		<h4 class="modal-title">Create A New Category</h4>
      		</div>
      		<div class="modal-body">
        		
        		{{-- New Category Input --}}
        		<div class="form-group">
        			{{ Form::label('categoryName', 'Category', array(
        				'class' => 'control-label'
        			)) }}
        			{{ Form::text('categoryName', '', array(
        				'id' => 'categoryName',
        				'class' => 'form-control',
        				'placeholder' => 'Enter Category Name'
        			)) }}
        		</div>

      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button id="createCategory" type="button" class="btn btn-primary">Create Category</button>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@stop

@section('javascript')

@parent

<script type="text/javascript">
	$(function() {

		$('#createCategory').on('click', function(e) {
			
			e.preventDefault();

			$.post(baseURL + '/category', {
				'name': $('#categoryName').val(),
			}, function(data) {
				
				var dropdown = $('#category');

				$('<option>')
					.val(data.id)
					.text(data.name)
					.appendTo(dropdown);

				dropdown.val(data.id);

				$('#categoryNameModal').modal('hide');

			}, 'json')
			.fail(function(jqXHR) {
				var response = $.parseJSON(jqXHR.responseText);
				alert(response.error.message);
			});
		});

	});
</script>
@stop