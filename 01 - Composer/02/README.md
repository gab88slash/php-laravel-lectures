# ESERCIZIO 02

Uno sportivo vuole seguire gli eventi delle olimpiadi invernali di Torino 2006. 
Poiché molte gare si svolgono in parallelo, lo sportivo ha il problema di riuscire a selezionare il
 maggior numero possibile di gare di suo interesse.

L’elenco di tutte le gare è contenuto in un file csv, in cui le gare sono indicate una per riga,
 in ordine casuale, nel formato _giorno_ , _tipo_gara_ , _finale_ dove:
 
- _giorno_ è il giorno in cui si svolge la gara in formato __dd/mm/yyyy__

- _tipo_gara_ è la disciplina che viene disputata 

- _finale_ è un intero (con significato Booleano) che indica se la gara è una finale (valore pari a 1) oppure una gara eliminatoria (valore pari a 0)


Visualizzare per ogni giorno una disciplina da visualizzare.

La disciplina suggerita deve essere scelta secondo le seguenti regole:

1.  se in un determinato giorno vi è una sola disciplina, indicare quella
2.  se in un determinato giorno vi sono due o più discipline in parallelo, ne verrà scelta una arbitrariamente dal programma
3.  se in un determinato giorno non vi sono discipline, si scriva “niente di interessante”

Bonus considerare che se una gara è una finale, deve avere la precedenza rispetto alle altre gare.