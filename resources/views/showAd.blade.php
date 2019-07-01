@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="card" style="width: 15rem;">
                <ul class="list-group list-group-flush">
                    @foreach ($categories as $category)
                        <li class="list-group-item"><a class="text-secondary" href="{{ url("/categories/{$category->id}") }}">{{ $category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-9">
            @foreach ($advertisements as $advertisement)
                <div class="card bg-light" style="width: 50rem; height: 90rem;">
                        <img height="500" class="card-img-top" src="/uploads/{{ $advertisement->display_image }}" alt="Card image cap"><br>
                        <h1 class="text-primary text-center">{{ $advertisement->product_name }}</h1>
                        <h3 class="text-danger text-center">BDT: {{ $advertisement->proposed_price }}</h3>
                        <div class="card-body text-center">
                            <h5 class="card-text text-primary">Brand:</h5>
                            <p class="card-text">{{ $advertisement->brand }}</p>
                            <h5 class="card-text text-primary">Condition:</h5>
                            <p class="card-text">{{ $advertisement->condition }}</p>
                            @if ($advertisement->buying_year)
                                <h5 class="card-text text-primary">Buying Year:</h5>
                                <p class="card-text">{{ $advertisement->buying_year }}</p>
                            @endif
                            <h5 class="card-text text-primary">Specification:</h5>
                            <p class="card-text">{{ $advertisement->specification }}</p>
                            @if ($advertisement->color)
                                <h5 class="card-text text-primary">Color:</h5>
                                <p class="card-text">{{ $advertisement->color }}</p>
                            @endif
                            @if ($advertisement->weight)
                                <h5 class="card-text text-primary">Weight:</h5>
                                <p class="card-text">{{ $advertisement->weight }}</p>
                            @endif
                            @if ($advertisement->size)
                                <h5 class="card-text text-primary">Size:</h5>
                                <p class="card-text">{{ $advertisement->size }}</p>
                            @endif
                            @if ($advertisement->guarantee)
                                <h5 class="card-text text-primary">Guarantee:</h5>
                                <p class="card-text">{{ $advertisement->guarantee }}</p>
                            @endif
                            @if ($advertisement->warranty)
                                <h5 class="card-text text-primary">Warranty:</h5>
                                <p class="card-text">{{ $advertisement->warranty }}</p>
                            @endif
                        </div>
                </div><br>
            @endforeach
        </div>
        </div>
    
</div>

@endsection