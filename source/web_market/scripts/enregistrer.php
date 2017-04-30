<?php
    /************************************************************************/
    /* 
        enregistrer par Abdoullah REZGUI
            - Procédure d'enregistrement d'un client
        Note : un client ne peut pas s'enregistrer en tant qu'administrateur    
    */
    /************************************************************************/
?>

<div align='center'>
    <!-- Demande des informations du client pour son enregistrement -->
    <form name="enregistrer" action="?page=requeteClient&type_requete=3" method="post">
    
        <table align="center">
        
            <tr>
                <td>Nom (nom d'utilisateur aussi) : <input type="text" name="nom" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>                
                <td>Mot de passe (nom d'utilisateur aussi) : <input type="password" name="mdp" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <td>Prénom : <input type="text" name="prenom" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <td>Adresse : <input type="text" name="adresse" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <td>Numéro de téléphone : <input type="text" name="tel" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <td>E-Mail : <input type="text" name="email" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <!-- Bouton : Valider l'enregistrement du client -->
                <td><center><input type="submit" name="valider" class="input_button" value="valider" /></center><br /></td>
            </tr>
            <br />    
            <tr>
                <td align="right">
                    <textarea rows ="25" cols="70">
CONDITIONS GENERALES D'UTILISATION (EXEMPLE TYPE)

    
    PREAMBULE

Les utilisateurs de notre site doivent avoir plus de 18 ans et doivent être capable juridiquement de contacter, visiter et utiliser notre site.

Les sites visités sont informatifs et ne pratiquent aucune vente directe (voir la liste des sites en bas de page) et se limitent à mettre en rapport des "prospects" avec des "fournisseurs" maîtres de leur art ; aucune transaction ne se fait par l'intermédiaire de la société F. VERGNE, la dite transaction ayant directement lieu entre les deux parties ; ainsi la responsabilité de la dite société F. VERGNE ne peut en aucun cas être engagé en cas de litige entre les parties sus-mentionnées. Les "produits" ou "services" présentés sont directement gérés par les sociétés "fournisseurs" auprès des "prospects" et leurs notices ou description est fournie à la société F. VERGNE par les dits "fournisseurs.

Tous les visiteurs de notre site sont réputés avoir lu et approuvé sans restriction nos conditions générales d'utilisation. En cas de désaccord avec les présentes, le visiteur doit immédiatement quitter notre site internet.

Les éléments suivant ne sont pas garantis : les anomalies, erreurs ou bugs des informations, produits ou services fournis sur le site.

Les interruptions ou pannes du site la compatibilité du site avec un matériel ou une configuration particulière En aucun cas la responsabilité de l'éditeur ne peut être engagée pour les dommages indirects et/ou immatériels, prévisibles ou imprévisibles (incluant la perte de profits) découlant de la fourniture et/ou de l'utilisation ou de l'impossibilité partielle ou totale d'utiliser les services fournis par le site quant au contenu des sites sur lesquels nous renvoyons par l'intermédiaire de liens hypertextes. en cas de survenance d'un événement irrésistible, imprévisible et extérieur.

Les éléments constitutifs de notre site Internet bénéficient, au même titre que les autres oeuvres de l'esprit, de la protection par le droit de la propriété intellectuelle : la société propriétaire du site reste titulaire de tous les droits de propriété intellectuelle relatifs au site et des droits d'usage y afférent l'accès au site ne confère aucun droit sur les droits de propriété intellectuelle relatifs au site, qui restent la propriété exclusive de la société F. VERGNE, titulaire du site.

les éléments accessibles sur le site sont protégés par les droits de propriété intellectuelle et industrille. sauf dispositions explicites, il est interdit de reproduire, modifier, transmettre, publier, adapter, sur quelque support que ce soit ou exploiter de quelque manière que ce soit, tout ou partie du site sans l'autorisation écrite préalable de la société F. VERGNE.La violation de ces dispositions pourra faire l'objet de toute action en justice appropriée, notamment d'une action en contrefaçon.

Les présents sites ont fait l'objet d'une déclaration a la CNIL. Leur numéro est inscrit sur la page d'entrée du site que vous lisez. Dans tous les cas et conformément à la législation française en vigueur et plus particulièrement à la loi du 6 janvier 1978 Informatique et liberté, vous disposez d'un droit d'accès, de rectification, d'opposition et de suppression sur ces données que vous pouvez exercer en écrivant à l'adresse suivante : F. VERGNE 24, rue du Pont Neuf 60660 Cires-les-Mello ainsi qu'à l'adresse email lafeste@lafeste.com . La collecte des données à usage commercial sur les dits sites à fait l'objet de la déclaration : numéro 1232417 à la CNIL.

Il est ici précisé que les bases de données constituée  par les emails envoyés par les différents sites ont fait l'objet de déclarations respectives auprès de la CNIL (Commission Nationale de l'Informatique et des Libertés).

Les sites sont hébergés sur les serveurs des sociétés : OVH - SAS au capital de 500 k€ RCS Roubaix – Tourcoing 424 761 419 00011 – Code APE 721Z - N° TVA : FR 22-424-761-419-00011
Siège social : 140 Quai du Sartel - 59100 Roubaix - France

Toutes les marques mentionnées dans les sites, sont la propriété exclusive de leurs ayants droit.

  
    MENTIONS LEGALES DU SITE

Glossaire :

- Utilisateur : Internaute se connectant, utilisant les annuaires / sites (voir glossaire).
- Informations personnelles : « les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent » (article 4 de la loi n° 78-17 du 6 janvier 1978).
- Le site que vous êtes en train de visiter.
- Partenaire : représentant d'une société ou de toute autre structure légale dont les produits, services, fabrications, prestations sont présentées par un site internet créé et géré par F. Vergne à la demande du partenaire.
- Apporteur d'affaires : la société La Feste qui à travers son réseau de sites internet sensibilise une clientèle potentiel pour un produit, un service, une fabrication en vue d'apporter des prospects à ses partenaires.
Editeurs

En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site que vous êtes en train de visiter l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi :


Le propriétaire et/ou éditeur est une personne morale.
Propriétaire et/ou éditeur du site : Abdoullah REZGUI

Informations personnelles collectées :

En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.

A l'occasion de l'utilisation du site que vous êtes en train de visiter, sont notamment recueillies les données suivantes :
- l'adresse Internet URL des liens par l'intermédiaire desquels l'utilisateur a accédé au site www.annuaire-referencement.fr.
- Le fournisseur d'accès de l'utilisateur ;
- L'adresse de protocole Internet (IP) de l'utilisateur.

L’utilisateur du présent site (ci-après dénommée « Utilisateur ») est informé que, lors de sa navigation sur le site que vous êtes en train de visiter (ci-après dénommé « Site »), des données à caractère personnel le concernant sont collectées et traitées par F. Vergne.

L’Utilisateur du Site est informé que ses données :

- sont collectées de manière loyale et licite,

- sont collectées pour des finalités déterminées, explicites et légitimes,

- ne seront pas traitées ultérieurement de manière incompatible avec ces finalités,

- sont adéquates, pertinentes et non excessives au regard des finalités pour lesquelles elles sont collectées et de leurs traitements ultérieurs,

- sont exactes et complètes,

- sont conservées sous une forme permettant l’identification des personnes concernées pendant une durée qui n’excède pas la durée nécessaire aux finalités pour lesquelles elles sont collectées et traitées.

En tout état de cause F. VERGNE ne collecte des informations personnelles relatives à l'utilisateur (nom, adresse électronique, coordonnées téléphoniques) que pour le besoin des services proposés par les annuaires / sites (voir glossaire).

L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il procède par lui-même à leur saisie.
Il est alors précisé à l'utilisateur du site que vous êtes en train de visiter le caractère obligatoire ou non des informations qu'il serait amené à fournir.

L'utilisateur justifiant de son identité dispose de la possibilité de solliciter auprès de F. VERGNE, à l'adresse électronique lafeste@lafeste.com :

- la vérification des données à caractère personnel le concernant ayant fait l'objet d'une collecte par F. VERGNE ou pour son compte ;
- les informations ayant trait aux finalités de traitement de ces données ;
- les informations ayant trait a l'identité et au rattachement géographique des destinataires de ces données ;
- la communication d'une copie de ces données délivrée gratuitement, dans la mesure où une telle demande n'est pas abusive, notamment par son caractère répétitif et disproportionné.

Aucune information personnelle de l'utilisateur du site que vous êtes en train de visiter n'est :

- collectée à l'insu de l'utilisateur ;
- publiée à l'insu de l'utilisateur ;
- échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l'hypothèse du rachat de F. VERGNE et de ses droits permettrait la transmission desdites informations à l'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l'utilisateur du site que vous êtes en train de visiter.

Au démeurant F. VERGNE est autorisé(e) à effectuer des études et analyses statistiques sur l'utilisation et la typologie des utilisateurs du site que vous êtes en train de visiter, sous réserve de confirmer l'anonymat de ces derniers.

 
Rectification des informations nominatives collectées

Conformément aux dispositions de l'article 34 de la loi n° 48-87 du 6 janvier 1978, l'utilisateur dispose d'un droit de modification des données nominatives collectées le concernant. Pour ce faire, l'utilisateur envoie à F. VERGNE :


- un courrier électronique à l'adresse lafeste@lafeste.com ,
- un courrier à l'adresse 24 rue du Pont Neuf, , 60660 CIRES LES MELLO, France ,
en indiquant son nom ou sa raison sociale, ses coordonnées physiques et/ou électroniques, ainsi que le cas échéant la référence dont il disposerait en tant que membre du site que vous êtes en train de visiter.
La modification interviendra dans des délais raisonnables à compter de la réception de la demande de l'utilisateur.

 
Déclaration cnil :

Le site que vous êtes en train de visiter collectant des informations personnelles de ses utilisateurs, il a fait l'objet d'une déclaration préalable auprès de la cnil enregistrée sous le numéro de récépissé non requis.
Cookies :

Un « Cookie » permet l'identification de l'utilisateur, la personnalisation de sa consultation du site que vous êtes en train de visiter et l'accélération de la mise en page du site grâce à l'enregistrement d'un léger fichier de données sur son ordinateur.
L'utilisateur reconnaît être informé de cette pratique et autorise F. VERGNE à y procéder.
En tout état de cause F. VERGNE s'engage à ne jamais communiquer le contenu de ces « Cookies » à des tierces personnes, sauf en cas de réquisition légale.
L'utilisateur peut refuser l'enregistrement de « Cookies » ou configurer son navigateur pour être prévenu préalablement à l'acception les « Cookies ». Pour ce faire, l'utilisateur procèdera au paramétrage de son navigateur à partir du menu « outil » pour Microsoft Internet Explorer 5 ou 6.0, ou du menu « Edition » pour Netscape 6 ou 7.

 
Droits d'auteur :

La totalité des éléments du site que vous êtes en train de visiter, notamment les textes, présentations, illustrations, photographies, arborescences et mises en forme sont, sauf documents publics et précisions complémentaires, la propriété intellectuelle exclusive de F. VERGNE ou de ses partenaires.
A ce titre, leurs représentations, reproductions, imbrications, diffusions et rediffusions, partielles ou totales, sont interdites conformément aux dispositions de l'article L. 122-4 du Code de la propriété intellectuelle. Toute personne y procédant sans pouvoir justifier d'une autorisation préalable et expresse du détenteur de ces droits encourt les peines relatives au délit de contrefaçon prévues aux articles L. 335-2 et suivants du Code de la propriété intellectuelle.
En outre, les représentations, reproductions, imbrications, diffusions et rediffusions, partielles ou totales, de la base de données contenue dans les annuaires / sites (voir glossaire) sont interdites en vertu des dispositions de la loi n°98-536 du 1er juillet 1998 relative à la protection juridique des bases de données.
En tout état de cause, sur toute copie autorisée de tout ou partie du contenu du site, devra figurer la mention « Copyright 2007 F. VERGNE tous droits réservés ».

Les éléments figurant au sein du présent site, tels que sons, images, photographies, vidéos, écrits, animations, programmes, charte graphique, utilitaires, bases de données, logiciel, sont protégés par les dispositions du Code de la propriété intellectuelle et appartiennent à [indiquer le nom du titulaire des droits de propriété intellectuelle afférents aux éléments du site].


L’utilisateur s’interdit de porter atteinte aux droits de propriété intellectuelle afférents à ces éléments et notamment de les reproduire, représenter, modifier, adapter, traduire, d’en extraire et/ou réutiliser une partie qualitativement ou quantitativement substantielle, à l’exclusion des actes nécessaires à leur usage normal et conforme.

 
Marques :

Les marques et logos contenus dans les annuaires / sites (voir glossaire) sont déposés par F. VERGNE, ou éventuellement par un de ses partenaires. A ce titre, toute personne procédant à leurs représentations, reproductions, imbrications, diffusions et rediffusions encourt les sanctions prévues aux articles L. 713-2 et suivants du Code de la propriété intellectuelle.
Marques citées :

Les marques citées soit textuellement sous forme de légende, soit graphiquement sous forme d'image, d'illustration ou de logo appartiennent à leurs propriétaires respectives et ne sont présentes sur les sites qu'en tant que représentantes du savoir-faire du partenaire du site dans ses fabrications, réalisations ou prestations. Ces figurations ont été communiquées à F. Vergne / La Feste par le partenaire et non directement copiées.
Précisions complémentaires relatives aux marques et droits d'auteur figurant sur le site que vous êtes en train de visiter :

Concepteur multimédia et graphisme : FV Events - Ces mentions légales et conditions d'utilisation ont été créées sur le site www.mentions-legales.fr (copyright Diagnostic et Formation - tous droits réservés).

 
Nature publicitaire du contenu du site :

En tout état de cause, F. VERGNE informe le cas échéant l'internaute de la nature publicitaire des contenus du site que vous êtes en train de visiter.

Notre société n'intervient qu'en tant que "apporteur d'affaires"  à travers des sites qui sont des "portails" de présentation et non des sites de vente en ligne de produit ; notre société n'intervient  aucunement en tant que prestataire final que ce soit :

    *  pour le tir d'un feu d'artifice automatique ou classique ou de quelque type que ce soit

    *  pour la mise en place de matériel scénique et festif de quelque type que ce soit

    *  pour la direction ou la gestion d'un événement de quelque taille, type que ce soit

    *  pour la mise en oeuvre d'un chantier événementiel

    *  pour la livraison du ou des produits qui sont l'affaire de la société mise en relation avec le client

    *  pour la mise à disposition de produits de plv, publicité, pavoisement ou l'un des produits ou services présentés sur nos sites

    *  d'une manière générale nos sites présentent des produits ou des prestations dont les prix sont communiqués par les sociétés avec lesquelles nous travaillons et dont nous ne sommes pas responsables

    *  le client est réputé agir en terme de relations commerciales avec la société qui lui est proposée mais qu'il n'est pas obligé de retenir et ne peut nous imputer un défaut de fabrication, un prix ou tout autre défaut ou manquement.
    
    * le client ne peut arguer du fait qu'il a trouvé un produit sur un de nos sites vitrines pour réclamer quelque dédomagement que ce soit en cas de problème lié aux dits produits.

La société La Feste en tant qu'apporteur d'affaire met en ligne sur internet des sites web présentant des produits, des prestations, des réalisations qui appartiennent au "partenaire" qui a sollicité la création du ou des dits sites.

Notre société se limite à écrire, concevoir, un cadre scénarisé, un site internet vitrine, proposer des prestataires, des fabricants ou des revendeurs"maîtres de leur art" qui assument l'entière responsabilité de leurs prestations, de leurs relations avec le client final comme du rendu spectaculaire du produit acheté.

Notre société ne se substitue en aucun cas au prestataire final, au revendeur, au fabricant, ou à l'usine qui agit ou fabrique pour le client.

Notre société ne peut être tenue en aucun cas responsable  en cas d'incident de quelque nature que ce soit lors de l'installation, exploitation ou démontage du spectacle, fêtes, manifestations, galas, feu d'artifice ou autre, le prestataire choisi par le client assurant la gestion et responsabilité de son chantier.

LES PRIX

Les prix communiqués le sont A TITRE INDICATIF et doivent faire l'objet d'une confirmation en bonne et due forme par l'établissement d'un devis entre les parties directement concernées notre société n'intervenant en aucune manière à cette étape du processus.

 
    Responsabilité :

LA SOCIETE décline toute responsabilité :

    * En cas d’interruption d'un de ses sitespour des opérations de maintenance techniques ou d’actualisation des informations publiées ;
    * En cas d’impossibilité momentanée d’accès à un de ses sites(et/ou aux sites lui étant liés) en raison de problèmes techniques et ce quelles qu’en soient l’origine et la provenance ;
    * En cas de dommages directs ou indirects causés à l’utilisateur, quelle qu’en soit la nature, résultant du contenu, de l’accès, ou de l’utilisation des sites de F. Vergne / La Feste (et/ou des sites qui lui sont liés) ;
    * En cas d’utilisation anormale ou d’une exploitation illicite des sites de la Feste. L’utilisateur des sites de F. Vergne / La Feste est alors seul responsable des dommages causés aux tiers et des conséquences des réclamations ou actions qui pourrait en découler. L’utilisateur renonce également à exercer tout recours contre F. Vergne - F. Vergne / La Feste dans le cas de poursuites diligentées par un tiers à son encontre du fait de l’utilisation et/ou de l’exploitation illicite du site.

 
    Observations et suggestions :

Il est possible de transmettre des observations et des suggestions au responsable du site à l'adresse électronique lafeste@lafeste.com.
Date de la dernière mise à jour :

La dernière mise à jour des mentions légales date du 2007-12-15.
Les principales lois concernées :

- Loi n° 78-87 du 6 janvier 1978, notamment modifiée par la loi n° 2004-801 du 6 août 2004 relative à l'informatique, aux fichiers et aux libertés.
- Loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.

 

Les présentes conditions générales sont soumises au droit français, qui détermine, au cas par cas, la loi applicable. En l'absence de toute disposition impérative contraire ou en présence d'un choix dans la détermination de la loi applicable, la loi française sera appliquée.
                </textarea></td>
            </tr>
        </table>
    </form>
</div>