<?php
/**
 * Soluzione all'esercizio di Martedì 26/01/2016
 *
 * Pratica su Composer e Inclusione di librerie
 */

require __DIR__ . '/vendor/autoload.php';
/*
 * RICORDA:
 * Abbiamo installato monolog/monolog tramite composer. Dalla documentazione seguiamo i passi indicati per inizializzare
 * la creazione di un file dove i nostri contenuti verranno loggati in maniera standard
 */

/*
 * La dicitura
 *
 * use Namespace\NomeClasse;
 *
 * permette di indicare univocamente quale dichiarazione della classe Logger indendiamo usare. Così non dobbiamo scrivere percorsi molto lunghi
 */
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name'); // in alternativa senza la dicitura 'use' avremmo dovuto scrivere new Monolog\Logger('name');

$log->pushHandler(new StreamHandler('app.log', Logger::DEBUG)); //a differenza di ieri creo un Log su cui vengono scritti i messaggi di debug

/*
 * a questo punto secondo la documentazione possiamo inserire nel log quello che vogliamo
 */
$log->debug('Stiamo avviando il file '. __DIR__ . __FILE__);


?>

    <!-- Andiamo a questo punto a creare un piccolo form per inviare dei dati allo script php -->

    <html>
    <div>
        <form action="" method="post">
            <input type="textarea" name="log_text" value="">
            <input type="submit" value="Invia">
        </form>
    </div>
    </html>

<?php

/*
 * nel nostro script php dovremo intercettare la richiesta e scrivere i dati all'interno.
 *
 * Usiamo inizialmente il metodo delle $_GET e $_POST su cui avete più familiarità
 *
 */

/*
 * Ricordatevi che $log è già inizializzato e quindi non ho necessità di compiere i passi precedenti
 */

if (isset($_POST["log_text"]) && $_POST["log_text"] != "")
{
    $log->debug($_POST["log_text"]);
}
/*
 * O in maniera più elegante
 */

extract($_POST);

if(isset($log_text) && $log_text != "") $log->debug("Log Usando extract per gli input" . $log_text);

/*
 * Per approfondire le librerie passiamo ad utilizzare un componente di Synfony
 *
 * Non ci interessa comprendere fino in fondo i meccanismi con cui la richiesta Http venga analizzata e catturata.
 *
 * In generale dovete sapere che vengono catturate le varie variabili globali e raggruppate in un unico oggetto STANDARD
 */


/*
 * Per fare questo basta installare https://packagist.org/packages/symfony/http-foundation
 *
 * nella pagina leggiamo
 *
 * composer require symfony/http-foundation
 */

/*
 * La libreria viene automaticamente inserita nel nostro autoload
 *
 * Passiamo ad analizzare la documentazione che potete trovare cercando Symfony HttpFoundation Component su Google
 *
 * oppure la trovate
 *
 * http://symfony.com/doc/current/components/http_foundation/introduction.html
 *
 * su questa pagina vengono anche in parte spiegati i meccanismi della libreria
 *
 *
 */


/*
 * Questo codice è completamente copiato dalla documentazione per inizializzare l'oggetto Request
 */
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

/*
 * Successivamente sono elencati i vari metodi che possiamo lanciare su questo oggetto.
 *
 * Inoltre se apriamo la deginizione della classe possiamo visualizzarli in maniera più dettagliata
 *
 *   * Gets a "parameter" value from any bag.
     *
     * This method is mainly useful for libraries that want to provide some flexibility. If you don't need the
     * flexibility in controllers, it is better to explicitly get request parameters from the appropriate
     * public property instead (attributes, query, request).
     *
     * Order of precedence: PATH (routing placeholders or custom attributes), GET, BODY
     *
     * @param string $key     the key
     * @param mixed  $default the default value
     *
     * @return mixed
     *
      public function get($key, $default = null)
 */

$log->debug('Log con Symfony/HttpFoundation'.$request->get('log_text','Non è stato inserito alcun input'));


?>