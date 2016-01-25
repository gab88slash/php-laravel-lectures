# 02 - Laravel

Laravel è la nuova stella dei framework PHP. Supporta il paradigma MVC e molti altri. Ha inoltre un sistema di templating
per aiutare a generare le viste in maniera pulita e modulare

Con questi esercizi cerchiamo di approcciarci al framework iniziando ad interagire con le componenti principali:

- Route
- Controller
- Viste e templating

## Sorgente del Sapere

https://laravel.com/docs/5.2

## Installazione

Due possibilità 

    composer global require "laravel/installer"
    larevel new IlNomeDelMioProgetto
    
o

    composer create-project --prefer-dist laravel/laravel blog
    

ma prima

### Requisiti

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

sotto directory di storage e bootstrap/cache devono avere permessi di scrittura per il web server o non può essere lanciato Laravel

## Cheatsheet per esercizi

    larevel new IlNomeDelMioProgetto
    
Crea un nuovo progetto laravel    
   
### Route
    
    Route:get('nome della rotta',funzione)
    
Aggiunge una rotta nella nostra applicazione

###  Views

    view('cartella.vista')
    view('cartella.vista')->with('nome variabile',$valore);
    view('cartella.vista',['nome variabile'=>$valore);
    view('cartella vista',compact($var1,$var2,$var3));
    
genera una vista con i dati passati per poi ritornarla come risposta

### Blade
    
echo della variabile sanitizzata

    {{ $variabile }}
    
echo della variabile non sanitizzata

    {!! $variabile !!}
    
#IF

struttura di controllo if in blade

    @if( $italiano )
    
    <div>Ciao Mondo</div>
    
    @elseif( $english )
    
    <div>Hello World</div>
    
    @else
    
    <div>Bonjour Monde</div>
    
    @endif
    
    @unless(Auth:check())
    Loggati
    @endunless
    
loop in blade    

    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}
    @endfor
    
    @foreach ($users as $user)
        <p>This is user {{ $user->id }}</p>
    @endforeach
    
    @forelse($users as $user)
        <li>{{ $user->name }}</li>
    @empty
        <p>No users</p>
    @endforelse
    
    @while (true)
        <p>I'm looping forever.</p>
    @endwhile
    
### Master Layout

    <html>
        <head>
            <title>App Name - @yield('title')</title>
        </head>
        <body>
            @section('sidebar')
                Codice della sidebar principale
            @show
    
            <div class="container">
                @yield('content')
            </div>
        </body>
    </html>
    
#### Yield

viene sostituito con il contenuto effettivo

#### Section

Crea una sezione che può essere sovrascritta o estesa

### Estendere un Layout


    @extends('layouts.master')
    
    @section('title', 'Page Title')
    
    @section('sidebar')
        @parent
    
        <p>This is appended to the master sidebar.</p>
    @endsection
    
    @section('content')
        <p>This is my body content.</p>
    @endsection
    
#### Extends

indica quale vista estendere

#### Section

Indica a quale sezione (definita da yield o section) fa riferimento il contenuto

la parola chiave parent permette di accedere al contenuto del layout padre

### Include

    @include('sotto.vista')
    
permette di includere una sottovista

