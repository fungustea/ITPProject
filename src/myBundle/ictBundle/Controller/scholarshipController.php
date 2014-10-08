<?php

namespace myBundle\ictBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use myBundle\ictBundle\Entity\scholarship;
use myBundle\ictBundle\Form\scholarshipType;

/**
 * scholarship controller.
 *
 */
class scholarshipController extends Controller
{
	/**
	 * Lists all scholarship entities.
	 *
	 */
	public function mainAction()
	{
		$em = $this->getDoctrine()->getManager();
	
		$entities = $em->getRepository('myBundleictBundle:scholarship')->findAll();
		$new_entities = array();
		foreach($entities as $entity)
		{
			flush();
			$fp = @fopen($entity->getURL(), "r");
		
			if ($fp !== false)
			{
				array_push($new_entities, $entity);
				// 				echo "Link works";
			}
			else
			{
				$entity->setURL("invalid link");
				array_push($new_entities, $entity);
				// 				echo"Link doesn't work";
			}
			@fclose($fp);
		}
		return $this->render('myBundleictBundle:Default:parent_scholarship.html.twig', array(
				'entities' => $new_entities,
		));
	}
    /**
     * Lists all scholarship entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('myBundleictBundle:scholarship')->findAll();

        return $this->render('myBundleictBundle:scholarship:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new scholarship entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new scholarship();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('scholarship_show', array('id' => $entity->getId())));
        }

        return $this->render('myBundleictBundle:scholarship:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a scholarship entity.
     *
     * @param scholarship $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(scholarship $entity)
    {
        $form = $this->createForm(new scholarshipType(), $entity, array(
            'action' => $this->generateUrl('scholarship_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new scholarship entity.
     *
     */
    public function newAction()
    {
        $entity = new scholarship();
        $form   = $this->createCreateForm($entity);

        return $this->render('myBundleictBundle:scholarship:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a scholarship entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:scholarship')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find scholarship entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('myBundleictBundle:scholarship:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing scholarship entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:scholarship')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find scholarship entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('myBundleictBundle:scholarship:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a scholarship entity.
    *
    * @param scholarship $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(scholarship $entity)
    {
        $form = $this->createForm(new scholarshipType(), $entity, array(
            'action' => $this->generateUrl('scholarship_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing scholarship entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:scholarship')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find scholarship entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('scholarship_edit', array('id' => $id)));
        }

        return $this->render('myBundleictBundle:scholarship:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Count popular an existing scholarship entity.
     *
     */
    public function countAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('myBundleictBundle:scholarship')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find scholarship entity.');
    	}
    	$entity->setPopular(($entity->getPopular())+1);
    	$em->flush();
    	$query = $em->createQuery(
    			'SELECT c FROM myBundleictBundle:scholarship c ORDER BY c.popular DESC'
    	);
    
    	$entities = $query->getResult();
    	return $this->render('myBundleictBundle:Default:parent_scholarship.html.twig', array(
    			'entities' => $entities,
    	));
    }
    /**
     * Deletes a scholarship entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('myBundleictBundle:scholarship')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find scholarship entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('scholarship'));
    }

    /**
     * Creates a form to delete a scholarship entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('scholarship_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
