@extends('templates/main',
    [
        'titulo'=>"Asafe's Pizzeria",
        'cabecalho' => "Welcome to Asafe's Pizzeria! Can i take your order?",
        'rota' => '',
        'relatorio' => '',
    ]
)

@section('conteudo')
    <div class="container text-dark">

        <h2>Who Are We?</h2>
        <p class="mb-4 ">
            We are a humble, slightly chaotic pizza shop delivering delicious slices since… 
            well, whenever you decide we were founded.
        </p>

        <h3>What We Offer</h3>
        <ul>
            <li>Fresh, hot pizzas made with love (and cheese abuse).</li>
            <li>Fast delivery by very tired couriers.</li>
            <li>Quality ingredients that we totally didn’t buy on sale.</li>
        </ul>

        <h3>Why Choose Us?</h3>
        <p>
            Great taste. Fair prices. And your code needed something in this blank section.
        </p>
        <img src="{{ asset('assets/img/pizza.jpg') }}" class="img-fluid" style="height: 300px; width: 600px;" alt="Delicious Pizza">

    </div>
@endsection