<?php

namespace App\Controller;

use App\Document\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function index()
    {
        /** @var User $user */
        $user = $this->getUser();

        return $this->render('admin/index.html.twig', [
            'user' => $user
        ]);
    }
}
