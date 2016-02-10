# 04 - Laravel

Laravel permette di inizializzare il database secondo le nostre necessità specificandole in apposite classi dette Migrazioni.

Usando il componente ORM (Object Relational Mapping) Eloquent possiamo semplificare ulteriormente 
l'accesso al database creando una mappatura delle tabelle considerando una singola riga come un'oggetto

## Sorgente del Sapere

https://laravel.com/docs/5.2/database
https://laravel.com/docs/5.2/migrations
https://laravel.com/docs/5.2/queries
https://laravel.com/docs/5.2/eloquent

## Cheatsheet per esercizi

### Generatori

    php artisan make:migration create_articles_table --create="articles" 

crea una nuova classe migrazione che crea la tabella articles con i campi base
    
    php artisan make:migration add_body_to_articles_table --table="articles"

crea una nuova classe migrazione che lavora sulla tabella articles

    $table->TIPO_COLONNA('nome_colonna');
    
aggiunge una colonna alla tabella

    Schema::drop('tabella');
    Schema::dropColumn('nome_colonna');
        
per eliminare una tabella o una colonna della tabella

### Usare le Migrazioni

    php migrate

avvia le migrazioni creando le tabelle

    php migrate:rollback

cancella le tabelle

### Modelli Eloquent

    php artisan make:model Article 

Crea un modello 

> !! Ricorda !! Il nome della tabella deve essere il nome del modello al plurale se no bisogna configurare la tabella nel modello
>
> protected $table = "nome_tabelle"
>

    $modello = new NomeModello();
    $modello->parametro = "imposto parametro";
    $modello->save();
    
    $modello = NomeModello::create(["parametro"=>"imposto parametro");
    
due possibilità per creare un modello e salvarlo
    
> !! Ricorda !! Nel secondo caso dobbiamo aver messo come __fillable__ i parametri necessari
>
> protected $fillable = ['parametro']
> 

### Query su Eloquent

    NomeModello::all();
    
Ritorna una collezione con tutti gli elementi;

    NomeModello::find(1);
     
Ritorna l'elemento con id uguale a 1;

    $query = NomeModello::where('name','ilmionome');
    
Inizia una query a partire da una where. Altri metodi:

- where
- whereIn/whereNotIn
- whereBetween/whereNotBetween
- whereNull/whereNotNull
- orWhere

- orderBy
- groupBy

Per ritornare una collezione con gli elementi selezionati nella query

    $query->get();

Per ritornare il primo elemento tra quelli selezionati nella query

    $query->first();
    
### Not Found exception

usando firstOrFail oppure findOrFail viene scatenata una ModelNotFoundException che genera generalmente una pagina 404

### Delete

    $modello->delete();
    
cancella un modello dal database
    
### Convenzioni Eloquent

- I nomi delle tabelle corrispondono allo _snake case_ plurale del nome

    Flight -> flights
    MyFlight -> my_flights
    
- Il nome della chiave primaria è 'id'
- I timestamp di base sono created_at e updated_at