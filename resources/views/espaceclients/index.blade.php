@extends('espaceclients.navbar')

@section('contenu')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            {{ __('Bienvenue dans l\'espace client du Erp Di Smart') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


