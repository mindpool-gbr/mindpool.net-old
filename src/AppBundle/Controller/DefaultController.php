<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}", defaults={"_locale": "xx"}, requirements={"_locale":"de|en|xx"}, name="homepage")
     */
    public function indexAction(Request $request)
    {
      // redirect to browser locale if supported
      if($request->getLocale() == 'xx'){
        $browserLocale = strtolower(str_split($_SERVER['HTTP_ACCEPT_LANGUAGE'], 2)[0]);
        if (in_array($browserLocale, $this->getParameter('languages'))) {
            return $this->redirectToRoute('homepage', array('_locale' => $browserLocale));
          }else{
            // or defaul locale
              return $this->redirectToRoute('homepage', array('_locale' => $this->getParameter('locale')));
          }
      }

      if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        return $this->redirectToRoute('dashboard');
      }
        return $this->render('@App/homepage.html.twig');
    }
    /**
     * @Route("/{_locale}/imprint", defaults={"_locale": "de"}, requirements={"_locale":"de|en"}, name="imprint")
     */
    public function imprintAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/imprint.html.twig');
    }
        /**
         * @Route("/{_locale}/", defaults={"_locale": "de"}, requirements={"_locale":"de|en"}, name="redirect_locale")
         */
        public function redirectAction(Request $request)
        {
          return $this->redirectToRoute('homepage');
        }
}
