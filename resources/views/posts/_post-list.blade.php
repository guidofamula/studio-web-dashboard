@forelse ($posts as $post)
	<div class="card my-2">
   <div class="card-body">
      <h5>{{ $post->title }}</h5>
      <p>
         {{-- Description --}}
         {{ $post->description }}
      </p>
      <div class="float-right">
         <!-- detail -->
         <a href="{{ route('posts.show', ['post' => $post ]) }}" class="btn btn-sm btn-primary" role="button">
            <i class="fas fa-eye"></i>
         </a>
         <!-- edit -->
         <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-sm btn-info" role="button">
            <i class="fas fa-edit"></i>
         </a>
         <!-- delete -->
         <form class="d-inline" role="alert"
          alert-text="{{ trans('posts.alert.delete.message.confirm', ['title' => $post->title]) }}"
          action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
          @csrf
          @method('DELETE')
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
         @if (request()->get('keyword'))
            {{ trans('posts.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
         @else
			   {{ trans('posts.label.no_data.fetch') }}
         @endif
		</strong>
	</p>
@endforelse