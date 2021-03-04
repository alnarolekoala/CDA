<?php


/**
 * Class Discs
 */
class Discs extends AbstractController
{

    public function __construct()
    {
    }

    /**
     * affichage de la liste des discs
     */
    public function index()
    {

        // accès à la méthode loadModel() de abstractController, qui permet de charger le model voulu
        $disc = $this->loadModel('Disc');
        // appel de la méthode getDiscsInformations()
        $discList = $disc->getDiscsInformations();
        // envoie des données vers la vue
        $this->render('index', ['discs' => $discList]);

    }


    /**
     * Page D'ajout
     */
    public function createDisc()
    {
        // définition variable de confirmation et tableau d'erreur
        $formError = [];
        $success = '';
        // chargement des models
        $disc = $this->loadModel('Disc');
        $artist = $this->loadModel('artist');
        $allArtist = $artist->getAll();

        if (isset($_POST['add'])) {
            // définition d'un tableau associatif contenant les regex
            $regex = [
                'title' => '/[A-ÿ ]$/',
                'year' => '/[0-9]{4,4}/',
                'label' => '/[A-ÿ ]$/',
                'genre' => '/[A-ÿ \,\/]+$/',
                'price' => '/^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,2})?$/',
                'artist' => '/[1-9A-ÿ ]$/'

            ];
            // appel de la méthode valideForm de l'abstractController permettant la validation du formulaire et la génération d'éventuels message d'erreur, stockage du retour
            // dans une variable
            $formError = $this->validForm($regex, $_POST);
            // s'il n'y a pas d'erreur
            if (count($formError) === 0) {
                $disc->setDiscTitle($_POST['title']);
                $disc->setDiscYear($_POST['year']);
                $disc->setDiscLabel($_POST['label']);
                $disc->setDiscGenre($_POST['genre']);
                $disc->setDiscPrice($_POST['price']);
                $disc->setArtistID($_POST['artist']);
                $disc->addDisc();
                $success = 'Add success !!!';
            }
        }
        $this->render('createDisc', [
            'artists' => $allArtist,
            'error' => $formError,
            'success' => $success
        ]);
    }

    /**
     * affichage du détail d'une voiture selon son id
     * validation du formulaire
     * @param $id
     */
    public function updateDisc($id)
    {
        // définition variable de confirmation et tableau d'erreur
        $formError = [];
        $success = '';
        // chargement des models
        $disc = $this->loadModel('Disc');
        $artist = $this->loadModel('artist');
        //appel des méthodes permettant l'affichage des différentes données
        $allArtist = $artist->getAll();
        $oneDisc = $disc->getOneDiscById($id);
        // si le formulaire est validé
        if (isset($_POST['update'])) {
            // définition d'un tableau associatif contenant les regex
            $regex = [
                'title' => '/[A-ÿ ]$/',
                'year' => '/[0-9]{4,4}/',
                'label' => '/[A-ÿ ]$/',
                'genre' => '/[A-ÿ \,\/]+$/',
                'price' => '/^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,2})?$/',
                'artist' => '/[1-9A-ÿ ]$/'
            ];
            // appel de la méthode valideForm de l'abstractController permettant la validation du formulaire et la génération d'éventuels message d'erreur, stockage du retour
            // dans une variable
            $formError = $this->validForm($regex, $_POST);
            // s'il n'y a pas d'erreur
            if (count($formError) === 0) {
                // accès aux accesseur
                $disc->setDiscPicture($_POST['picture']);
                $disc->setDiscTitle($_POST['title']);
                $disc->setDiscYear($_POST['year']);
                $disc->setDiscLabel($_POST['label']);
                $disc->setDiscGenre($_POST['genre']);
                $disc->setDiscPrice($_POST['price']);
                $disc->setArtistID($_POST['artist']);
                $disc->addDisc();
                $success = 'Update success !!!';
            }
        }
        // appel de la fonction render de l'abstractController permettant l'affichage d'une vue
        $this->render('updateDisc', [
            'disc' => $oneDisc,
            'artists' => $allArtist,
            'error' => $formError,
            'success' => $success
        ]);
    }
    public function deleteDisc($id)
    {
        $success = '';
        $error = '';
        // accès à la méthode loadModel() de abstractController, qui permet de charger le model voulu
        $disc = $this->loadModel('Disc');
        if ($disc->deleleDisc($id)) {
            $success = 'Disque supprimée avec succès';
        } else {
            $error = 'Erreur lors de la suppression';
        }
        // appel de la méthode getCarsInformations()
        $carsList = $disc->getDiscsInformations();
        // envoie des données vers la vue
        $this->render('index', [
            'discs' => $discsList,
            'success' => $success,
            'error' => $error
        ]);
    }
    public function getDiscByModel($title) {
        $disc = $this->loadModel('Disc');
        $discTitle = $disc->getCarByModel($title);
        if ($discTitle >= 1) {
            echo 'Ce titre est déjà présent dans la base';
        }
    }


}
