Vuoi condividere la tua connessione, ma non hai l'opportunità di inviare gli SMS di verifica?

Nessun problema! La soluzione c'è!

Scarica questo git, buttalo sul tuo web server e dai inizio al tuo wifi-sharing.

Ma non dimenticarti di eseguire il comando: composer require evilfreelancer/routeros-api-php

La durata consigliatà è di 15 minuti con una velocità bassa per evitare che poi uno se ne aprofitti.

Funzionamento del sistema:

*1.* Un utente accede alla vostra rete, ha due scelte, inserire le credenziali oppure registrarsi per avere 15 minuti di prova gratuita.

*2.* Se l'utente sceglie la prova gratuita è costretto a inserire i suoi dati (Nome, Cognome, Email, Numero di telefono) e dopodiché il corrispettivo utente verrà reindirizzato verso la pagina della creazione delle credenziali e della iniezione GET nel browser per evitare le inserisca.

*4.* Fine.

Il progetto è stato programmato completamente in PHP, tutto modificabile ma **non rivendibile**. Si prega di rispettare i corrispettivi termini d'utilizzo.

Il config.php (che è da modificare sennò il sistema non funziona) richiede la configurazione di 16 campi (Database; Invio SMS tramite router Mikrotik; Credenziali del router Mikrotik con la rete hotspot configurata; IP dell’hotspot).

Crediti:

EvilFreelancer (API MIKROTIK);
