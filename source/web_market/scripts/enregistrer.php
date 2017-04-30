<?php
    /************************************************************************/
    /* 
        enregistrer par Abdoullah REZGUI
            - Proc�dure d'enregistrement d'un client
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
                <td>Pr�nom : <input type="text" name="prenom" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <td>Adresse : <input type="text" name="adresse" class="input_text" id="input_text_menu" /></td>
            </tr>
            <br />
            <tr>
                <td>Num�ro de t�l�phone : <input type="text" name="tel" class="input_text" id="input_text_menu" /></td>
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

Les utilisateurs de notre site doivent avoir plus de 18 ans et doivent �tre capable juridiquement de contacter, visiter et utiliser notre site.

Les sites visit�s sont informatifs et ne pratiquent aucune vente directe (voir la liste des sites en bas de page) et se limitent � mettre en rapport des "prospects" avec des "fournisseurs" ma�tres de leur art ; aucune transaction ne se fait par l'interm�diaire de la soci�t� F. VERGNE, la dite transaction ayant directement lieu entre les deux parties ; ainsi la responsabilit� de la dite soci�t� F. VERGNE ne peut en aucun cas �tre engag� en cas de litige entre les parties sus-mentionn�es. Les "produits" ou "services" pr�sent�s sont directement g�r�s par les soci�t�s "fournisseurs" aupr�s des "prospects" et leurs notices ou description est fournie � la soci�t� F. VERGNE par les dits "fournisseurs.

Tous les visiteurs de notre site sont r�put�s avoir lu et approuv� sans restriction nos conditions g�n�rales d'utilisation. En cas de d�saccord avec les pr�sentes, le visiteur doit imm�diatement quitter notre site internet.

Les �l�ments suivant ne sont pas garantis : les anomalies, erreurs ou bugs des informations, produits ou services fournis sur le site.

Les interruptions ou pannes du site la compatibilit� du site avec un mat�riel ou une configuration particuli�re En aucun cas la responsabilit� de l'�diteur ne peut �tre engag�e pour les dommages indirects et/ou immat�riels, pr�visibles ou impr�visibles (incluant la perte de profits) d�coulant de la fourniture et/ou de l'utilisation ou de l'impossibilit� partielle ou totale d'utiliser les services fournis par le site quant au contenu des sites sur lesquels nous renvoyons par l'interm�diaire de liens hypertextes. en cas de survenance d'un �v�nement irr�sistible, impr�visible et ext�rieur.

Les �l�ments constitutifs de notre site Internet b�n�ficient, au m�me titre que les autres oeuvres de l'esprit, de la protection par le droit de la propri�t� intellectuelle : la soci�t� propri�taire du site reste titulaire de tous les droits de propri�t� intellectuelle relatifs au site et des droits d'usage y aff�rent l'acc�s au site ne conf�re aucun droit sur les droits de propri�t� intellectuelle relatifs au site, qui restent la propri�t� exclusive de la soci�t� F. VERGNE, titulaire du site.

les �l�ments accessibles sur le site sont prot�g�s par les droits de propri�t� intellectuelle et industrille. sauf dispositions explicites, il est interdit de reproduire, modifier, transmettre, publier, adapter, sur quelque support que ce soit ou exploiter de quelque mani�re que ce soit, tout ou partie du site sans l'autorisation �crite pr�alable de la soci�t� F. VERGNE.La violation de ces dispositions pourra faire l'objet de toute action en justice appropri�e, notamment d'une action en contrefa�on.

Les pr�sents sites ont fait l'objet d'une d�claration a la CNIL. Leur num�ro est inscrit sur la page d'entr�e du site que vous lisez. Dans tous les cas et conform�ment � la l�gislation fran�aise en vigueur et plus particuli�rement � la loi du 6 janvier 1978 Informatique et libert�, vous disposez d'un droit d'acc�s, de rectification, d'opposition et de suppression sur ces donn�es que vous pouvez exercer en �crivant � l'adresse suivante : F. VERGNE 24, rue du Pont Neuf 60660 Cires-les-Mello ainsi qu'� l'adresse email lafeste@lafeste.com . La collecte des donn�es � usage commercial sur les dits sites � fait l'objet de la d�claration : num�ro 1232417 � la CNIL.

Il est ici pr�cis� que les bases de donn�es constitu�e  par les emails envoy�s par les diff�rents sites ont fait l'objet de d�clarations respectives aupr�s de la CNIL (Commission Nationale de l'Informatique et des Libert�s).

Les sites sont h�berg�s sur les serveurs des soci�t�s : OVH - SAS au capital de 500 k� RCS Roubaix � Tourcoing 424 761 419 00011 � Code APE 721Z - N� TVA : FR 22-424-761-419-00011
Si�ge social : 140 Quai du Sartel - 59100 Roubaix - France

Toutes les marques mentionn�es dans les sites, sont la propri�t� exclusive de leurs ayants droit.

  
    MENTIONS LEGALES DU SITE

Glossaire :

- Utilisateur : Internaute se connectant, utilisant les annuaires / sites (voir glossaire).
- Informations personnelles : � les informations qui permettent, sous quelque forme que ce soit, directement ou non, l'identification des personnes physiques auxquelles elles s'appliquent � (article 4 de la loi n� 78-17 du 6 janvier 1978).
- Le site que vous �tes en train de visiter.
- Partenaire : repr�sentant d'une soci�t� ou de toute autre structure l�gale dont les produits, services, fabrications, prestations sont pr�sent�es par un site internet cr�� et g�r� par F. Vergne � la demande du partenaire.
- Apporteur d'affaires : la soci�t� La Feste qui � travers son r�seau de sites internet sensibilise une client�le potentiel pour un produit, un service, une fabrication en vue d'apporter des prospects � ses partenaires.
Editeurs

En vertu de l'article 6 de la loi n� 2004-575 du 21 juin 2004 pour la confiance dans l'�conomie num�rique, il est pr�cis� aux utilisateurs du site que vous �tes en train de visiter l'identit� des diff�rents intervenants dans le cadre de sa r�alisation et de son suivi :


Le propri�taire et/ou �diteur est une personne morale.
Propri�taire et/ou �diteur du site : Abdoullah REZGUI

Informations personnelles collect�es :

En France, les donn�es personnelles sont notamment prot�g�es par la loi n� 78-87 du 6 janvier 1978, la loi n� 2004-801 du 6 ao�t 2004, l'article L. 226-13 du Code p�nal et la Directive Europ�enne du 24 octobre 1995.

A l'occasion de l'utilisation du site que vous �tes en train de visiter, sont notamment recueillies les donn�es suivantes :
- l'adresse Internet URL des liens par l'interm�diaire desquels l'utilisateur a acc�d� au site www.annuaire-referencement.fr.
- Le fournisseur d'acc�s de l'utilisateur ;
- L'adresse de protocole Internet (IP) de l'utilisateur.

L�utilisateur du pr�sent site (ci-apr�s d�nomm�e � Utilisateur �) est inform� que, lors de sa navigation sur le site que vous �tes en train de visiter (ci-apr�s d�nomm� � Site �), des donn�es � caract�re personnel le concernant sont collect�es et trait�es par F. Vergne.

L�Utilisateur du Site est inform� que ses donn�es :

- sont collect�es de mani�re loyale et licite,

- sont collect�es pour des finalit�s d�termin�es, explicites et l�gitimes,

- ne seront pas trait�es ult�rieurement de mani�re incompatible avec ces finalit�s,

- sont ad�quates, pertinentes et non excessives au regard des finalit�s pour lesquelles elles sont collect�es et de leurs traitements ult�rieurs,

- sont exactes et compl�tes,

- sont conserv�es sous une forme permettant l�identification des personnes concern�es pendant une dur�e qui n�exc�de pas la dur�e n�cessaire aux finalit�s pour lesquelles elles sont collect�es et trait�es.

En tout �tat de cause F. VERGNE ne collecte des informations personnelles relatives � l'utilisateur (nom, adresse �lectronique, coordonn�es t�l�phoniques) que pour le besoin des services propos�s par les annuaires / sites (voir glossaire).

L'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu'il proc�de par lui-m�me � leur saisie.
Il est alors pr�cis� � l'utilisateur du site que vous �tes en train de visiter le caract�re obligatoire ou non des informations qu'il serait amen� � fournir.

L'utilisateur justifiant de son identit� dispose de la possibilit� de solliciter aupr�s de F. VERGNE, � l'adresse �lectronique lafeste@lafeste.com :

- la v�rification des donn�es � caract�re personnel le concernant ayant fait l'objet d'une collecte par F. VERGNE ou pour son compte ;
- les informations ayant trait aux finalit�s de traitement de ces donn�es ;
- les informations ayant trait a l'identit� et au rattachement g�ographique des destinataires de ces donn�es ;
- la communication d'une copie de ces donn�es d�livr�e gratuitement, dans la mesure o� une telle demande n'est pas abusive, notamment par son caract�re r�p�titif et disproportionn�.

Aucune information personnelle de l'utilisateur du site que vous �tes en train de visiter n'est :

- collect�e � l'insu de l'utilisateur ;
- publi�e � l'insu de l'utilisateur ;
- �chang�e, transf�r�e, c�d�e ou vendue sur un support quelconque � des tiers. Seule l'hypoth�se du rachat de F. VERGNE et de ses droits permettrait la transmission desdites informations � l'�ventuel acqu�reur qui serait � son tour tenu de la m�me obligation de conservation et de modification des donn�es vis � vis de l'utilisateur du site que vous �tes en train de visiter.

Au d�meurant F. VERGNE est autoris�(e) � effectuer des �tudes et analyses statistiques sur l'utilisation et la typologie des utilisateurs du site que vous �tes en train de visiter, sous r�serve de confirmer l'anonymat de ces derniers.

 
Rectification des informations nominatives collect�es

Conform�ment aux dispositions de l'article 34 de la loi n� 48-87 du 6 janvier 1978, l'utilisateur dispose d'un droit de modification des donn�es nominatives collect�es le concernant. Pour ce faire, l'utilisateur envoie � F. VERGNE :


- un courrier �lectronique � l'adresse lafeste@lafeste.com ,
- un courrier � l'adresse 24 rue du Pont Neuf, , 60660 CIRES LES MELLO, France ,
en indiquant son nom ou sa raison sociale, ses coordonn�es physiques et/ou �lectroniques, ainsi que le cas �ch�ant la r�f�rence dont il disposerait en tant que membre du site que vous �tes en train de visiter.
La modification interviendra dans des d�lais raisonnables � compter de la r�ception de la demande de l'utilisateur.

 
D�claration cnil :

Le site que vous �tes en train de visiter collectant des informations personnelles de ses utilisateurs, il a fait l'objet d'une d�claration pr�alable aupr�s de la cnil enregistr�e sous le num�ro de r�c�piss� non requis.
Cookies :

Un � Cookie � permet l'identification de l'utilisateur, la personnalisation de sa consultation du site que vous �tes en train de visiter et l'acc�l�ration de la mise en page du site gr�ce � l'enregistrement d'un l�ger fichier de donn�es sur son ordinateur.
L'utilisateur reconna�t �tre inform� de cette pratique et autorise F. VERGNE � y proc�der.
En tout �tat de cause F. VERGNE s'engage � ne jamais communiquer le contenu de ces � Cookies � � des tierces personnes, sauf en cas de r�quisition l�gale.
L'utilisateur peut refuser l'enregistrement de � Cookies � ou configurer son navigateur pour �tre pr�venu pr�alablement � l'acception les � Cookies �. Pour ce faire, l'utilisateur proc�dera au param�trage de son navigateur � partir du menu � outil � pour Microsoft Internet Explorer 5 ou 6.0, ou du menu � Edition � pour Netscape 6 ou 7.

 
Droits d'auteur :

La totalit� des �l�ments du site que vous �tes en train de visiter, notamment les textes, pr�sentations, illustrations, photographies, arborescences et mises en forme sont, sauf documents publics et pr�cisions compl�mentaires, la propri�t� intellectuelle exclusive de F. VERGNE ou de ses partenaires.
A ce titre, leurs repr�sentations, reproductions, imbrications, diffusions et rediffusions, partielles ou totales, sont interdites conform�ment aux dispositions de l'article L. 122-4 du Code de la propri�t� intellectuelle. Toute personne y proc�dant sans pouvoir justifier d'une autorisation pr�alable et expresse du d�tenteur de ces droits encourt les peines relatives au d�lit de contrefa�on pr�vues aux articles L. 335-2 et suivants du Code de la propri�t� intellectuelle.
En outre, les repr�sentations, reproductions, imbrications, diffusions et rediffusions, partielles ou totales, de la base de donn�es contenue dans les annuaires / sites (voir glossaire) sont interdites en vertu des dispositions de la loi n�98-536 du 1er juillet 1998 relative � la protection juridique des bases de donn�es.
En tout �tat de cause, sur toute copie autoris�e de tout ou partie du contenu du site, devra figurer la mention � Copyright 2007 F. VERGNE tous droits r�serv�s �.

Les �l�ments figurant au sein du pr�sent site, tels que sons, images, photographies, vid�os, �crits, animations, programmes, charte graphique, utilitaires, bases de donn�es, logiciel, sont prot�g�s par les dispositions du Code de la propri�t� intellectuelle et appartiennent � [indiquer le nom du titulaire des droits de propri�t� intellectuelle aff�rents aux �l�ments du site].


L�utilisateur s�interdit de porter atteinte aux droits de propri�t� intellectuelle aff�rents � ces �l�ments et notamment de les reproduire, repr�senter, modifier, adapter, traduire, d�en extraire et/ou r�utiliser une partie qualitativement ou quantitativement substantielle, � l�exclusion des actes n�cessaires � leur usage normal et conforme.

 
Marques :

Les marques et logos contenus dans les annuaires / sites (voir glossaire) sont d�pos�s par F. VERGNE, ou �ventuellement par un de ses partenaires. A ce titre, toute personne proc�dant � leurs repr�sentations, reproductions, imbrications, diffusions et rediffusions encourt les sanctions pr�vues aux articles L. 713-2 et suivants du Code de la propri�t� intellectuelle.
Marques cit�es :

Les marques cit�es soit textuellement sous forme de l�gende, soit graphiquement sous forme d'image, d'illustration ou de logo appartiennent � leurs propri�taires respectives et ne sont pr�sentes sur les sites qu'en tant que repr�sentantes du savoir-faire du partenaire du site dans ses fabrications, r�alisations ou prestations. Ces figurations ont �t� communiqu�es � F. Vergne / La Feste par le partenaire et non directement copi�es.
Pr�cisions compl�mentaires relatives aux marques et droits d'auteur figurant sur le site que vous �tes en train de visiter :

Concepteur multim�dia et graphisme : FV Events - Ces mentions l�gales et conditions d'utilisation ont �t� cr��es sur le site www.mentions-legales.fr (copyright Diagnostic et Formation - tous droits r�serv�s).

 
Nature publicitaire du contenu du site :

En tout �tat de cause, F. VERGNE informe le cas �ch�ant l'internaute de la nature publicitaire des contenus du site que vous �tes en train de visiter.

Notre soci�t� n'intervient qu'en tant que "apporteur d'affaires"  � travers des sites qui sont des "portails" de pr�sentation et non des sites de vente en ligne de produit ; notre soci�t� n'intervient  aucunement en tant que prestataire final que ce soit :

    *  pour le tir d'un feu d'artifice automatique ou classique ou de quelque type que ce soit

    *  pour la mise en place de mat�riel sc�nique et festif de quelque type que ce soit

    *  pour la direction ou la gestion d'un �v�nement de quelque taille, type que ce soit

    *  pour la mise en oeuvre d'un chantier �v�nementiel

    *  pour la livraison du ou des produits qui sont l'affaire de la soci�t� mise en relation avec le client

    *  pour la mise � disposition de produits de plv, publicit�, pavoisement ou l'un des produits ou services pr�sent�s sur nos sites

    *  d'une mani�re g�n�rale nos sites pr�sentent des produits ou des prestations dont les prix sont communiqu�s par les soci�t�s avec lesquelles nous travaillons et dont nous ne sommes pas responsables

    *  le client est r�put� agir en terme de relations commerciales avec la soci�t� qui lui est propos�e mais qu'il n'est pas oblig� de retenir et ne peut nous imputer un d�faut de fabrication, un prix ou tout autre d�faut ou manquement.
    
    * le client ne peut arguer du fait qu'il a trouv� un produit sur un de nos sites vitrines pour r�clamer quelque d�domagement que ce soit en cas de probl�me li� aux dits produits.

La soci�t� La Feste en tant qu'apporteur d'affaire met en ligne sur internet des sites web pr�sentant des produits, des prestations, des r�alisations qui appartiennent au "partenaire" qui a sollicit� la cr�ation du ou des dits sites.

Notre soci�t� se limite � �crire, concevoir, un cadre sc�naris�, un site internet vitrine, proposer des prestataires, des fabricants ou des revendeurs"ma�tres de leur art" qui assument l'enti�re responsabilit� de leurs prestations, de leurs relations avec le client final comme du rendu spectaculaire du produit achet�.

Notre soci�t� ne se substitue en aucun cas au prestataire final, au revendeur, au fabricant, ou � l'usine qui agit ou fabrique pour le client.

Notre soci�t� ne peut �tre tenue en aucun cas responsable  en cas d'incident de quelque nature que ce soit lors de l'installation, exploitation ou d�montage du spectacle, f�tes, manifestations, galas, feu d'artifice ou autre, le prestataire choisi par le client assurant la gestion et responsabilit� de son chantier.

LES PRIX

Les prix communiqu�s le sont A TITRE INDICATIF et doivent faire l'objet d'une confirmation en bonne et due forme par l'�tablissement d'un devis entre les parties directement concern�es notre soci�t� n'intervenant en aucune mani�re � cette �tape du processus.

 
    Responsabilit� :

LA SOCIETE d�cline toute responsabilit� :

    * En cas d�interruption d'un de ses sitespour des op�rations de maintenance techniques ou d�actualisation des informations publi�es ;
    * En cas d�impossibilit� momentan�e d�acc�s � un de ses sites(et/ou aux sites lui �tant li�s) en raison de probl�mes techniques et ce quelles qu�en soient l�origine et la provenance ;
    * En cas de dommages directs ou indirects caus�s � l�utilisateur, quelle qu�en soit la nature, r�sultant du contenu, de l�acc�s, ou de l�utilisation des sites de F. Vergne / La Feste (et/ou des sites qui lui sont li�s) ;
    * En cas d�utilisation anormale ou d�une exploitation illicite des sites de la Feste. L�utilisateur des sites de F. Vergne / La Feste est alors seul responsable des dommages caus�s aux tiers et des cons�quences des r�clamations ou actions qui pourrait en d�couler. L�utilisateur renonce �galement � exercer tout recours contre F. Vergne - F. Vergne / La Feste dans le cas de poursuites diligent�es par un tiers � son encontre du fait de l�utilisation et/ou de l�exploitation illicite du site.

 
    Observations et suggestions :

Il est possible de transmettre des observations et des suggestions au responsable du site � l'adresse �lectronique lafeste@lafeste.com.
Date de la derni�re mise � jour :

La derni�re mise � jour des mentions l�gales date du 2007-12-15.
Les principales lois concern�es :

- Loi n� 78-87 du 6 janvier 1978, notamment modifi�e par la loi n� 2004-801 du 6 ao�t 2004 relative � l'informatique, aux fichiers et aux libert�s.
- Loi n� 2004-575 du 21 juin 2004 pour la confiance dans l'�conomie num�rique.

 

Les pr�sentes conditions g�n�rales sont soumises au droit fran�ais, qui d�termine, au cas par cas, la loi applicable. En l'absence de toute disposition imp�rative contraire ou en pr�sence d'un choix dans la d�termination de la loi applicable, la loi fran�aise sera appliqu�e.
                </textarea></td>
            </tr>
        </table>
    </form>
</div>