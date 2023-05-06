
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Conferences') }}</div>

                    <div class="card-body">
                        @if (count($conferences) === 0)
                            <p>{{ __('No conferences found.') }}</p>
                        @else
                            <ul>
                                @foreach ($conferences as $conference)
                                    <li>{{ $conference->title }} - {{ $conference->organizer }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

