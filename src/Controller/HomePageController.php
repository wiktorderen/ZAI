<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class HomePageController extends AbstractController
{
    /**
     * @Route("/", name="app_home_page")
     */
    public function index(): Response
    {
        $api_key = '702160109552cbfcf97527f0449b8760';
        $api_url = 'https://api.openweathermap.org/data/2.5/weather?lat=53.775275&lon=20.486707&appid=' .$api_key;
        $weather = json_decode( file_get_contents(($api_url), true));

        $weather_json = json_encode($weather);
        $temperature = $weather->main->temp;
        $celsius = round($temperature - 273.15);
        $city = $weather->name;
        $sun_clouds = $weather->weather[0]->main;

        //$news_apiKey = 'aa038d2bf8bb48d1ab4f00d96a3837d2';
        //$news_apiURL = 'https://newsapi.org/v2/everything?q=Apple&from=2022-05-11&sortBy=popularity&apiKey='.$news_apiKey;
        //$news = json_encode( file_get_contents(($news_apiURL), true));
        //dump($news);


        return $this->render('home_page/index.html.twig',
            array('celsius' => $celsius,
                'weather' => $weather,
                'city' => $city,
                'sun_clouds' => $sun_clouds)
        );
    }
}
