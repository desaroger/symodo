<?php

namespace App\Controller;

use App\Document\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/")
     */
    public function home()
    {
        /** @var User $user */
        $user = $this->getUser();
//        $user = null;

        return $this->render('index.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/register/confirmed")
     */
    public function registerConfirmed()
    {
        return $this->redirectToRoute('app_index_home');
    }
}
