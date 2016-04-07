<?php

namespace ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session\Session;



class ArticleController extends Controller
{

    /**
 * @Route("/cookie/{name}",name="cookie")
 */

    public function cookieAction(Request $request)
    {
     $response = new Response ();
      $response -> headers->setCookie(new Cookie('test','$name'));

      return $this->render('ArticleBundle:Default:cookie.html.twig',[], $response);

      //read
      $request->cookies->has('test');
      $request->cookies->get('test');


        /*return $this->render('ArticleBundle:Default:article.html.twig', [
            'name'      =>$name
        ]);*/


      }


    /**
     * @Route("/session1",name="session1")
     */

    public function session1Action()
    {
        $this->get('session')->set('test','session clément');
        return $this->render('ArticleBundle:Default:session1.html.twig',[]);
    }

    /**
     * @Route("/session2",name="session2")
     */


    public function session2Action()
    {
        $toto=$this->get('session')->get('test');

        return $this->render('ArticleBundle:Default:session2.html.twig',['toti'=>$toto]);
    }


    /**
     * @Route("/flashbag",name="flashbag")
     */

    public function flashbagAction()
    {
         $this->get('session')->getFlashBag()->add('success','succès');
         $this->get('session')->getFlashBag()->add('error','erreur');
         $this->get('session')->getFlashBag()->add('alert','alert');
         $this->get('session')->getFlashBag()->add('info','information');
         return $this->redirect($this->generateUrl('toto'));
    }


    /**
     * @Route("/toto",name="toto")
     */

    public function totoAction()
    {

        return $this->render('ArticleBundle:Default:flashbag.html.twig',[]);
    }

    /**
     * @Route("/404",name="404")
     */

    public function erreurAction()
    {

        throw $this->createNotFoundException('Unable to find something');

    }


    public function myAction()
    {
        if ($this -> isGranted('ROLE_ADMIN'))
        {

        }
    }

    /**
       * @Route("/lovegoogle")
       */
    public function loveGoogleAction()
    {
        return $this->redirect('http://google.com');

    }

}
