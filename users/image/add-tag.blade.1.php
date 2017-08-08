@extends('layout.master')

@section('content')

<div class="row">
<div class="col-sm-12 for-background">
	<div class="col-sm-6 for-background">
	 {!! Form::open(array('url' => 'save-tag')) !!}
		<div class="col-sm-12 padding0">
			<p class="p-tag">Create Tag</p>
			<label>Tag Name</label>
			<input type="text" name="name" placeholder="Enter Tag" class="tag-txtbox">
			@if ($errors->has('name'))
                <span class="help-block">
                    <strong class="strong">{{ $errors->first('name') }}</strong>
                </span>
            @endif
			<button type="submit" class="tag-btn">Submit</button>
		</div>
	</div>


	<div class="col-sm-6  padding-top for-background">
		<div class="col-sm-6 padding0 ">
			<label class="p-tag1 display-block">Show</label>
			<select class="tag-show">
				
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				
			</select>
		</div>
		<div class="col-sm-6  padding0 ">
			<label>Search:</label>
			<input type="search" name="search" class="srch-txtbox">
		</div>

		<div class="col-sm-12  padding0 padding-top">
			<table id="example2" class="table table-bordered table-hover for-background">
				<thead>
					<tr>
						<td>Serial NO.</td>
						<td>Name</td>
						<td>Delete</td>
					</tr>
				</thead>

				<tbody>
				    @foreach($tagInfo as $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td><a href="{{ url('delete-tag/id', $value->id) }}">
						<i class="fa fa-trash" aria-hidden="true"></i>
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
     {!! Form::close() !!}
	</div>
</div>
</div>
@endsection