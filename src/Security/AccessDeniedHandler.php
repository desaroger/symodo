<?php

namespace App\Security;

use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler extends Controller implements AccessDeniedHandlerInterface
{
    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        $this->addFlash('warning', 'You have no permission to access /admin');
        return $this->redirectToRoute('app_index_home');
    }
}
