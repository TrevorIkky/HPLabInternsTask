@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Dashboard</div>

				<div class="card-body">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif

					You are logged in!
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Address</th>
						<th scope="col">Email</th>
						<th scope="col">Status</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					@if(count($students) > 0)
					@foreach($students as $student)
					<tr>
						<th scope="row">{{ $student->user_id  }}.</th>
						<td>{{ $student->name  }}</td>
						<td>{{ $student->address }}</td>
						<td>{{ $student->email }}</td>
						<td>
							@if( $student->suspended == 0  )
								Active
							@else
								Suspended
							@endif
						</td>
							<td >
								<a class="btn btn-primary" href="/students/{{$student->user_id}}/edit" role="button">Edit</a>

							</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td colspan="4"  >No students yet  </>
					</tr>
					@endif

				</tbody>
			</table>

					{{ $students->links() }}
		</div>
	</div>
</div>
@endsection

