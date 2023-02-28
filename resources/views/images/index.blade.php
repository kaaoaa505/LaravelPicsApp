<x-layout title="Discover free images">

    <div class="container-fluid mt-4">

        @if ($msg = session('success'))
            <x-alert type="success" dissmissable>
                {{ $component->icon() }} {{ $msg }}
            </x-alert>
        @endif

        <div class="grid row" data-masonry='{"percentPosition": true }'>

            @foreach ($images as $image)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <a href="{{ $image->permalink() }}">
                            <img src="{{ $image->getUrl() }}" alt="{{ $image->title }}" class="card-img-top">
                            <input type="hidden" name="file" value="{{$image->file}}">
                        </a>

                        <div class="photo-buttons">
                            <a href="{{ $image->route('edit') }}" class="btn btn-sm btn-info me-2">Edit</a>
                            <x-form style="display: inline;" action="{{ $image->route('destroy') }}" method="delete">
                                <button type="submit" onclick="return confirm('Are you sure?');"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </x-form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{ $images->links('pagination::bootstrap-5') }}
    </div>
</x-layout>
