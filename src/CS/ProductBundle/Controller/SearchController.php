<?php

namespace CS\ProductBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;

class SearchController extends ResourceController {


public function searchAction(Request $request)
{
    $query = $request->get('search', null);
 
    // notre index est directement disponible sous forme de service
    $index = $this->container->get('fos_elastica.index.website.user');
 
    $searchQuery = new \Elastica\Query\QueryString();
    $searchQuery->setParam('query', $query);
 
    // nous forçons l'opérateur de recherche à AND, car on veut les résultats qui
    // correspondent à tous les mots de la recherche, plutôt qu'à au moins un
    // d'entre eux (opérateur OR)
    $searchQuery->setDefaultOperator('OR');
 
    // on exécute une requête de type "fields", qui portera sur les colonnes "name"
    // et "zipcode" de l'index
    $searchQuery->setParam('fields', array(
        'nom', 
        'prenom',
    ));
 
    // exécution de la requête, limitée aux 10 premiers résultats
    $results = $index->search($searchQuery, 10)->getResults();
 
    $data = array();
 
    // on arrange les données des résultats...
    foreach ($results as $result) {
        $source = $result->getSource();
        $data[] = array(
            'suggest'   => $source['prenom'].' '.$source['nom'],
            'prenom'   => $source['prenom'],
            'nom'      => $source['nom'],
        );
    }
 
    // ...avant de les retourner en json
    return new JsonResponse($data, 200, array(
        'Cache-Control' => 'no-cache',
    ));
}

}
