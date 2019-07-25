<?php

namespace App\DataFixtures;

use App\Entity\Symptom;
use App\Service\ArrayRandom;
use Doctrine\Common\Persistence\ObjectManager;

class SymptomFixtures extends BaseFixtures
{
    const SYMPTOMS = [
        "Absence de pouls", "Absence des règles", "Agitation", "Agressivité","Anxiété", "Aphtes",
        "Assoupissement", "Atrophie musculaire dans la jambe", "Atrophie musculaire du bras",
        "Augmentation de la salivation", "Augmentation de la sensibilité tactile", "Augmentation de l'appétit",
        "Augmentation des pulsions", "Augmentation du volume urinaire", "Blessure",
        "Bombé à la paroi abdominale", "Bouche sèche", "Bouffées de chaleur", "Boule dans le sein", "Bouton",
        "Bruit dans l'oreille", "Brûlure à la langue", "Brûlure dans la gorge", "Brûlure des yeux",
        "Brûlures dans le nez", "Brûlures d'estomac", "Changements dans les ongles", "Chute des cheveux",
        "Cicatrice", "Clignotement des yeux", "Cloques sur la peau",
        "Coloration jaunâtre de la partie blanche de l'oeil", "Comédon", "Courbure de la colonne vertébrale",
        "Crampes", "Crampes dans les jambes", "Croûtes", "Décoloration des ongles", "Défécation difficile",
        "Défécation difficile", "Défécation douloureuse", "Défécation incomplète", "Défécation incontrôlée",
        "Défécation malodorante", "Défense abdominale", "Déformation de la cheville",
        "Déformation de la hanche", "Déformation de l'orteil", "Déformation du doigt",
        "Déformation du dos", "Déformation du genou", "Démangeaison dans la gueule ou gorge",
        "Démangeaison dans le nez", "Démangeaison dans l'oreille", "Démangeaison de la peau",
        "Démangeaison de l'anus", "Démangeaison des yeux", "Démangeaison ou brûlure dans la région génitale",
        "Démangeaison sur la tête", "Désir insatiable de manger", "Désorientation temporelle ou locale",
        "Desquamation de la peau", "Desquamation de la peau sur la tête", "Diarrhée ", "Difficulté à avaler",
        "Difficulté à comprendre le discours", "Difficulté à parler",
        "Difficulté à uriner lié à un début retardé", "Difficulté d'adaptation clair-obscur",
        "Difficulté de concentration", "Diminution de l'appétit", "Diminution du jet urinaire",
        "Douleur à la hanche", "Douleur à la jambe liée au stress", "Douleur au flanc",
        "Douleur brûlante de l'estomac", "Douleur dans la poitrine", "Douleur irradiant à la jambe",
        "Douleur irradiant au bras", "Douleur musculaire", "Douleurs à la respiration",
        "Douleurs abdominales associées aux menstruations", "Douleurs abdominales basses",
        "Douleurs lombaires", "Douleurs testiculaires", "Durcissement de la peau", "Écoulement nasal",
        "Écoulement purulent par le vagin", "Écoulement purulent par l'urètre", "Engourdissement dans le bras",
        "Engourdissement dans le jambe", "Engourdissement des mains", "Enrouement", "Épaississement de la peau",
        "Épanchement articulaire", "Eruption cutanée", "Éruption cutanée", "Estomac dilaté", "Éternuements",
        "Étourdissement", "Évanouissement", "Expectorations", "Faible vue pour les objets lointains",
        "Faible vue pour les objets proches", "Faiblesse musculaire", "Faiblesse musculaire dans la jambe",
        "Faiblesse musculaire dans le bras", "Faiblesse ou engourdissement du côté droite ou gauche du corps",
        "Fatigue", "Fièvre", "Flatulence", "Fracture osseuse", "Fragilité des ongles", "Frissons",
        "Gonflement dans la région génitale", "Gonflement de la langue", "Gonflement de la main",
        "Gonflement de l'orteil", "Gonflement des articulations", "Gonflement des chevilles",
        "Gonflement des ganglions au niveau des aisselles", "Gonflement des ganglions dans l'aine",
        "Gonflement des ganglions dans le cou", "Gonflement des jambes", "Gonflement des joues",
        "Gonflement des lèvres", "Gonflement des paupières", "Gonflement des testicules", "Gonflement du bras",
        "Gonflement du pied", "Gonflement du visage", "Grain de beauté irrégulier",
        "Grossissement de la structure de la peau", "Hallucination", "Halo", "Hoquet", "Hypersensibilité à la lumière",
        "Immobilisation", "Inactivité physique",
        "Inconscience courte", "Insomnie", "Instabilité de l'articulation", "Joints rouges", "Langue rouge brillant",
        "Larmes", "Machoire bloquée", "Maigreur", "Mains froides", "Mal à  la bouche", "Mal à avaler", "Mal à la gorge",
        "Mal à la main", "Mal à l'anus", "Mal à l'oreille", "Mal à mâcher", "Mal au cou", "Mal au dos", "Mal au genou",
        "Mal au pied", "Mal au visage", "Mal aux joints", "Mal aux membres", "Mal aux mollets", "Mal aux os",
        "Mal aux yeux", "Mal dans l'estomac", "Mal de tête", "Malentendants", "Malposition des testicules",
        "Manque d'air", "Manque de mémoire", "Miction douloureuse", "Mictions fréquentes",
        "Mobilité reduite de la cheville", "Mobilité réduite de la colonne vertébrale", "Mobilité réduite de la hanche",
        "Mobilité réduite de la jambe", "Mobilité réduite des doigts", "Moins de 3 défécations par semaine",
        "Mouvements involontaires", "Nausée", "Nervosité", "Nez bouché", "Non-cicatrisation des plaies de la peau",
        "Opression dans la poitrine", "Pâleur", "Palpitation", "Paralysie", "Paralysie faciale", "Paupière tombantes",
        "Paupières collées", "Peau de couleur bleue", "Peau de couleur jaune", "Peau humide, ramolli", "Peau rouge",
        "Peau sèche", "Perte auditive", "Perte de cils", "Perte de poids", "Perte des cheveux",
        "Perte du champ visuel", "Perte d'urine après uriner", "Picotements", "Pieds froids", "Prise de poids",
        "Problèmes avec le sens du toucher dans le visage", "Problèmes avec le sens du toucher dans les pieds",
        "Protrusion des yeux", "Pustule", "Raideur dans le cou", "Raideur matinale", "Raideur musculaire",
        "Rebond tendresse", "Respiration rapide et approfondi", "Rythme cardiaque irrégulier", "Saignement dans l'oeil",
        "Saignement de vagin", "Saignement du nez", "Sang dans les selles", "Satiété précoce", "Sautes d'humeur",
        "Scalp rouge", "Selles grasses", "Selles noires", "Sensation de brûlure au moment d'uriner",
        "Sensation de corps étranger dans l'oeil", "Sensation de défaillance", "Sensation de pression dans l'oreille",
        "Sensation de tension dans les jambes", "Sensation de vidange incomplète", "Sensibilité à la lumière",
        "Sensibilité au bruit", "Sensibilité au froid", "Sifflement", "Soif excessive",
        "Somnolence avec endormissement spontané", "Souffle au coeur", "Sueurs froides", "Sueurs nocturnes", "Surpoids",
        "Tache bleue sur la peau", "Tique", "Toux", "Toux grasse", "Toux nocturne", "Toux sanglante", "Transpiration",
        "Tremblement au mouvement", "Tremblement au repos", "Tristesse", "Trou de mémoire",
        "Trouble à trouver les mots", "Trouble de la menstruation", "Trouble de l'érection", "Troubles de la vision",
        "Troubles de l'équilibre", "Ulcère de jambe", "Urgence d'uriner", "Urine foncée", "Uriner pendant la nuit",
        "Veines marquées", "Ventre gonflé", "Verrues génitales", "Vision double", "Vision double, aiguë",
        "Vision trouble", "Vomissement", "Vomissements de sang", "Yeux rouges", "Yeux secs"
    ];

    protected $index = 0;

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Symptom::class, count(self::SYMPTOMS), function (Symptom $symptom) {
            $symptom->setName(self::SYMPTOMS[$this->index]);
            $this->index++;
        });
        $manager->flush();
    }
}
