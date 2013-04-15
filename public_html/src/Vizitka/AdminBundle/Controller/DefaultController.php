<?php
namespace Vizitka\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request;
use Vizitka\MainBundle\Entity\Pages,
    Vizitka\MainBundle\Entity\Articles,
    Vizitka\MainBundle\Entity\Modules;
use Vizitka\AdminBundle\Form\Type\ArticleForm,
    Vizitka\AdminBundle\Form\Type\ModuleForm,
    Vizitka\AdminBundle\Form\Type\PageForm;
use Vizitka\AdminBundle\Helper\Translit;

class DefaultController extends Controller {

    public function indexAction() {
        $name = "Админка";
        return $this->render('VizitkaAdminBundle:Default:index.html.twig', array('name' => $name));
    }

    public function moduleAction(Request $request) {
        $form = $this->createForm(new ModuleForm($this->getDoctrine()), new Modules());
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $f = $form->getData();
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($f);
            $em->flush();
        }
        return $this->render('VizitkaAdminBundle:Default:module.html.twig', array(
                    'form' => $form->createView(),
                    'name' => 'Модули',
                ));
    }

    public function articleAction() {
        $readmore = "<hr /><hr /><hr />";
        $translit = new Translit();
        $form = $this->createForm(new ArticleForm($this->getDoctrine()), new Articles());
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $f = $form->getData();
            if (!$f->getPreview()) {
                $f->setPreview(explode($readmore, $f->getArticle())[0]);
                $f->setArticle(strtr($f->getArticle(), array($readmore => "")));
            }
            $f->setUrl($translit->tr($f->getTitle()) . '/');
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($f);
            $em->flush();
        }
        return $this->render('VizitkaAdminBundle:Default:article.html.twig', array(
                    'form' => $form->createView(),
                    'name' => 'Статьи',
                ));
    }

    public function article_listAction() {
        $articles = $this->getDoctrine()
                ->getRepository('VizitkaMainBundle:Articles')
                ->findAll();
        return $this->render('VizitkaAdminBundle:Default:article-list.html.twig', array(
                    'articles' => $articles,
                    'name' => 'Список статей',
                ));
    }

    public function article_editAction($id = false) {
        if ($id) {
            $article_edit = $this->getDoctrine()
                    ->getRepository('VizitkaMainBundle:Articles')
                    ->find($id);
            $form = $this->createForm(new ArticleForm($this->getDoctrine()), $article_edit);
        } else {
            $request = $this->getRequest();
            $post = $request->request->get('article_form');

            if ($request->getMethod() == 'POST') {
                $em = $this->getDoctrine()->getEntityManager();
                $article_edit = $em->getRepository('VizitkaMainBundle:Articles')->find($post['id']);
                $article_edit->setTitle($post['title']);
                $readmore = "<hr /><hr /><hr />";
                $article_edit->setPreview(explode($readmore, $post['article'])[0]);
                $article_edit->setArticle($post['article']);
                $article_edit->setPageId($post['page_id']);
                $em->flush();
                $form = $this->createForm(new ArticleForm($this->getDoctrine()), $article_edit);
            }
        }
        return $this->render('VizitkaAdminBundle:Default:article-edit.html.twig', array(
                    'form' => $form->createView(),
                    'name' => 'Редактирование статьи',
                ));
    }

    public function pageAction(Request $request) {
        $name = "Страницы";
        $translit = new Translit();     
        $form = $this->createForm(new PageForm($this->getDoctrine()), new Pages());    
        $page = $this->getDoctrine()
                ->getRepository('VizitkaMainBundle:Pages')
                ->findAll();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            $f = $form->getData();
            $f->setUrl($translit->tr($f->getName()) . '/');
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($f);
            $em->flush();
            return $this->redirect('/admin/page');
        }
        return $this->render('VizitkaAdminBundle:Default:page.html.twig', array(
                    'name' => $name,
                    'form' => $form->createView(),
                    'p' => $page,
                ));
    }  

}
