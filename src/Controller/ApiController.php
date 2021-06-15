<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Person;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'api')]
    public function api(): Response
    {
        //create new instance of entity Person with dummy values
        $dummy_person = new Person;
        $dummy_person->setGender('male');
        $dummy_person->setFirstname('Maik');
        $dummy_person->setLastname('Stuermer');

        //get data from instance and encode to json
        $data = ['gender' => $dummy_person->getGender(), 'firstname' => $dummy_person->getFirstname(), 'lastname' => $dummy_person->getLastname()];
        $json = json_encode($data);
        
        //return json of instance
        $response = new Response($json);
        $response->headers->set('Conten-Type', 'application/json');
        return $response;

        // return $this->render('api/index.html.twig', [
        //     'controller_name' => 'ApiController',
        //     'json' => $json,
        // ]);
        
    }
}
