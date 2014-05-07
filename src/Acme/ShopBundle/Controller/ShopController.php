<?php

namespace Acme\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\ShopBundle\Entity\Shop;
use Acme\ShopBundle\Form\ShopType;

/**
 * Shop controller.
 *
 */
class ShopController extends Controller
{

    /**
     * Lists all Shop entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeShopBundle:Shop')->findAll();

        return $this->render('AcmeShopBundle:Shop:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    public function getWholeTable() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AcmeShopBundle:Shop')->findAll();
        $shops=array();
        foreach ($entities as $key => $shop) {
            $shops[$key]['shop_id'] = $shop->getId();
            $shops[$key]['name'] = $shop->getName();
            $shops[$key]['contacts'] = $shop->getContacts();
            $shops[$key]['description'] = $shop->getDescription();
            $shops[$key]['longitude'] = $shop->getLongitude();
            $shops[$key]['latitude'] = $shop->getLatitude();
        }
        return $shops;
    }
    
    
    
    
    
    
    /**
     * Creates a new Shop entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Shop();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('shop_crud_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeShopBundle:Shop:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Shop entity.
    *
    * @param Shop $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Shop $entity)
    {
        $form = $this->createForm(new ShopType(), $entity, array(
            'action' => $this->generateUrl('shop_crud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Shop entity.
     *
     */
    public function newAction()
    {
        $entity = new Shop();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeShopBundle:Shop:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Shop entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeShopBundle:Shop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeShopBundle:Shop:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Shop entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeShopBundle:Shop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeShopBundle:Shop:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Shop entity.
    *
    * @param Shop $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Shop $entity)
    {
        $form = $this->createForm(new ShopType(), $entity, array(
            'action' => $this->generateUrl('shop_crud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Shop entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeShopBundle:Shop')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Shop entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('shop_crud_edit', array('id' => $id)));
        }

        return $this->render('AcmeShopBundle:Shop:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Shop entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeShopBundle:Shop')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Shop entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('shop_crud'));
    }

    /**
     * Creates a form to delete a Shop entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('shop_crud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
