
##############################
Feature 0 : modello progetto
------------------------------
Progetto di sublime text 2
Struttura be + fe + data
Cartella demo con qualche esempio di manipolazione json in php


##############################
Feature 1 : json model
------------------------------
creata struttura json su 
	data/appz.json
La struttura prevede la presenza di 
	"Applicazioni"
		"DeliverableType" per ogni applicazione. tipo iOS, Android, o variani. Si può specificare se si tratta comunque di iOS con flag
			"Release" per ogni deliverabletype. Le release contengono il grosso dei metadati
				"Build" per contenere su ogni release i vari pacchetti (Staging, prod ecc)





##############################
Feature 2 : Json index
------------------------------
Pagina di visualizzazione json su 
[..]/fe/index.php
javascript che indenda carinamente il file data/appz.json




##############################
Feature 3 : command line php app manager
------------------------------
Command line manager che accetta tutti i parametri in ingresso per aggiungere una build al data model. 
Il comando si esegue per ogni build, per cui si passa tutto l'albero. Da raffinare poi per specificare parametri di Release solo una volta ed aggiungere le build ad una release esistente. 
Comando da lanciare : 

 php be/appmanager.php --app Lottomatica  --deliverable iOS --relName "Feature Visore" --relDir "dirrel" --relVersion 1.5.20 --relBranch trunk --relRevision 6509 --relDate "2015-09-13" --relTime "12:10:23" --tags "BU,ok" --buildName "Staging" --buildPath "Staging"  -i


##############################
TODO NEXT : Aggiunta di un oggetto Build al json
------------------------------

##############################
TODO NEXT : Decidere se le directory/path vengono specificati o sono dedotti 
------------------------------