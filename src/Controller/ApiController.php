<?php

namespace App\Controller;
use App\Entity\Order;
use App\Entity\SuperAdmin;

//use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{
    #data = json_decode()


    /**
     * @Route("/api_get", name="api_order")
     */

    public function index(): Response
    {
        $order = $this->getDoctrine()->getRepository(SuperAdmin::class)->findAll();
        //dump($order);
        //$order_json = json_decode($order);
        //dump($order_json);
        $fun = $this->getDoctrine()->getRepository(SuperAdmin::class)->getAll();

        //dump(json_encode($fun));
        return $this->json($fun);



     /*   return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);*/
    }



    /**
     * @Route("/api_post", name="api_order_post")
     */

    public function indexxx(Request $request)
    {
        $get_data = $request->getContent();

        $get_data =  '{"id":11,"email":"wiktor@wiasdaddktor.pl","roles":["ROLE_ADMIN"],"password":"$2y$13$dpqb3JAyTVtUh\/S32jLKVeLngepSbmQ9vgaP1\/bvM0T6UleEQd5bO","name":"Wiktor","last_name":"Dere\u0144"}';

        $get_data_decode = json_decode($get_data, true);
        dump($get_data_decode);

        $newUser = new SuperAdmin();
        $newUser->setEmail($get_data_decode["email"]);
        $newUser->setName($get_data_decode["name"]);
        $newUser->setLastName($get_data_decode["last_name"]);
        $newUser->setRoles($get_data_decode["roles"]);
        $newUser->setPassword($get_data_decode["password"]);
        $em = $this->getDoctrine()->getManager();
        $em->persist($newUser);
        $em->flush();
        dump($get_data_decode);

        return $this->json($get_data);
    }
}
