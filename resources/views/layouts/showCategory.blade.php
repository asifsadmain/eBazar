
        <div class="container container-fluid">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-2">
                        <div class="card" style="width: 9rem; height: 12rem">
                            <img height="100rem" width="90rem" src="/uploads/{{ $category->image }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="text-center text-secondary" href="{{ url("/categories/{$category->id}") }}">{{ $category->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
