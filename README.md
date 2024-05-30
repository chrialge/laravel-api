## Instruction

Ciao @qui, creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.
Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.
Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.

Descrizione:
Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze ed il pacchetto Laravel Preset con autenticazione.
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:

-   Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office
-   Creazione del modello Project con relativa migrazione, seeder, controller e rotte
-   Per la parte di back-office creiamo un resource controller Admin\ProjectController per gestire tutte le operazioni CRUD dei progetti
    Bonus
    Implementiamo la validazione dei dati dei Progetti nelle operazioni CRUD che lo richiedono usando le form requests.

## Instruction

Ripercorrete gli steps visti a lezione e completate le operazioni CRUD (edit/update/delete)

# Bonus:

Aggiungete i messaggi di sessione quando fare il redirect dopo aver creato, aggiornato e cancellato una risorsa.

## Instruction 3

Ciao @qui, continuiamo a lavorare nella repo dei giorni scorsi e aggiungiamo un’immagine ai nostri progetti.
Ricordiamoci di creare il symlink con l’apposito comando artisan e di aggiungere l’attributo enctype="multipart/form-data" ai form di creazione e di modifica!
Ricordate di implementare anche la cancellazione dell'immagine esistente qualora il post venda eliminato completamente.

## Instruction 4

Ciao @qui,
continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Type. Questa entità rappresenta la tipologia di progetto ed è in relazione one to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

-   creare la migration per la tabella types
-   creare il model Type
-   creare la migration di modifica per la tabella projects per aggiungere la chiave esterna
-   aggiungere ai model Type e Project i metodi per definire la relazione one to many
-   visualizzare nella pagina di dettaglio di un progetto la tipologia associata, se presente
-   permettere all’utente di associare una tipologia nella pagina di creazione e modifica di un progetto
-   gestire il salvataggio dell’associazione progetto-tipologia con opportune regole di validazione

# Bonus 1:

creare il seeder per il model Type.

# Bonus 2:

aggiungere le operazioni CRUD per il model Type, in modo da gestire le tipologie di progetto direttamente dal pannello di amministrazione.

## Instruction 5

Ciao @qui, continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Technology. Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

-   creare la migration per la tabella technologies
-   creare il model Technology
-   creare la migration per la tabella pivot project_technology
-   aggiungere ai model Technology e Project i metodi per definire la relazione many to many
-   visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
-   permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
-   gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione

# Bonus 1:

creare il seeder per il model Technology.

# Bonus 2:

aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.
