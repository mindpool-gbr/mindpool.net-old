<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DashboardController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     * @Route("/{_locale}/dashboard", defaults={"_locale": "de"}, requirements={"_locale":"de|en"}, name="dashboard")
     */
    public function dashboardAction()
    {
      // $usersEnabled = count($this->getDoctrine()->getRepository('UserBundle:User')->findByEnabled(true));
      // $usersDisabled = count($this->getDoctrine()->getRepository('UserBundle:User')->findByEnabled(false));
        $usersEnabled = 27;
        $usersDisabled = 42;

      return $this->render('@App/dashboard.html.twig', Array(
          'usersEnabled'=>$usersEnabled,
          'usersDisabled'=>$usersDisabled,
      ));
    }
}
