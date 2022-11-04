@forelse ($posts as $post)
	<div class="card">
   <div class="card-body">
      <h5>{{ $post->title }}</h5>
      <p>
         {{-- Description --}}
         {{ $post->description }}
      </p>
      <div class="float-right">
         <!-- detail -->
         <a href="#" class="btn btn-sm btn-primary" role="button">
            <i class="fas fa-eye"></i>
         </a>
         <!-- edit -->
         <a class="btn btn-sm btn-info" role="button">
            <i class="fas fa-edit"></i>
         </a>
         <!-- delete -->
         <form class="d-inline" action="" method="POST">
            <button type="submit" class="btn btn-sm btn-danger">
               <i class="fas fa-trash"></i>
            </button>
         </form>
      </div>
   </div>
</div>
@empty
	<p>
		<strong>
			{{ trans('posts.label.no_data.fetch') }}
		</strong>
	</p>
@endforelse