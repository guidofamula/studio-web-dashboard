@forelse ($inbox as $i)
    <div class="card my-2">
        <div class="card-body">
            <h5>
                <a href="{{ route('dashboard.inbox-detail', ['inbox' => $i]) }}">
                    {{ $i->name }}
                </a>
            </h5>
            <h5 class="text-justify text-primary">
                <strong class="badge badge-primary">
                    {{ $i->email }}

                </strong>
            </h5>
            <p>
                {{-- Description --}}
                {{ Str::limit($i->message, 100) }}
            </p>
            <div class="float-right">
                <!-- detail -->
                <a href="{{ route('dashboard.inbox-detail', ['inbox' => $i]) }}" class="btn btn-sm btn-primary"
                    role="button">
                    <i class="fas fa-eye"></i>
                </a>
                <!-- delete -->
                <form class="d-inline" action="{{ route('dashboard.inbox-delete', ['inbox' => $i]) }}"
                    role="alert-delete" method="POST" alert-title="{{ trans('inbox.alert.delete.title') }}"
                    alert-text="{{ trans('inbox.alert.delete.message.confirm', ['title' => $i->name]) }}"
                    alert-btn-cancel="{{ trans('inbox.button.cancel.value') }}"
                    alert-btn-yes="{{ trans('inbox.button.delete.value') }}">
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
                {{ trans('inbox.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
            @else
                {{ trans('inbox.label.no_data.fetch') }}
            @endif
        </strong>
    </p>
@endforelse
