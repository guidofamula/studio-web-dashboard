<ul class="pl-1 my-1" style="list-style: none;">
	@foreach ($categories as $category)
	   <li class="form-group form-check my-1">
	      <input class="form-check-input" value="{{ $category->id }}" type="checkbox" name="category[]">
	      <label class="form-check-label">
	      {{ $category->title }}
	    </label>
	   </li>
	@endforeach
</ul>