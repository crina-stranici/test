<?php

namespace Crina\SiteManagement\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Crina\SiteManagement\Model\Site;
use Crina\SiteManagement\Model\SiteQuery;
use Crina\SiteManagement\SiteBundle\Form\Type\SiteType;

class DefaultController extends Controller
{
    public function listAction($page)
    {
        $site = SiteQuery::create()
                ->paginate($page, $maxPerPage = 5);
        
        return $this->render('CrinaSiteManagementSiteBundle:Default:list.html.twig',
            array('site' => $site, 'currentPage' => $page));
    }

    public function editAction($id)
    {
        $site = SiteQuery::create()
                ->filterById($id)
                ->findOneOrCreate();
        
        $form = $this->createForm(new SiteType, $site);
          
        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);
            
            if ($form->isValid()) {               
                $site->save();

                return $this->redirect($this->generateUrl('crina_site_management_site_list'));
            }
        }
        return $this->render('CrinaSiteManagementSiteBundle:Default:edit.html.twig',
            array('form' => $form->createView(), 'id' => $id));
    }
    
    public function deleteAction($id)
    {
        SiteQuery::create()->filterById($id)->delete();
        $referer = $this->getRequest()->headers->get('referer');
        return new RedirectResponse($referer);
    }
            
}
