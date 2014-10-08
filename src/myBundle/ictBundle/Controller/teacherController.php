<?php

namespace myBundle\ictBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use myBundle\ictBundle\Entity\teacher;
use myBundle\ictBundle\Form\teacherType;

/**
 * teacher controller.
 *
 */
class teacherController extends Controller
{
	/**
	 * Lists all teacher entities.
	 *
	 */
	public function mainAction()
	{
		$em = $this->getDoctrine()->getManager();
	
		$entities = $em->getRepository('myBundleictBundle:teacher')->findAll();
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
		return $this->render('myBundleictBundle:Default:teacher_skill.html.twig', array(
				'entities' => $new_entities,
		));
	}
    /**
     * Lists all teacher entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('myBundleictBundle:teacher')->findAll();

        return $this->render('myBundleictBundle:teacher:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new teacher entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new teacher();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('teacher_show', array('id' => $entity->getId())));
        }

        return $this->render('myBundleictBundle:teacher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a teacher entity.
     *
     * @param teacher $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(teacher $entity)
    {
        $form = $this->createForm(new teacherType(), $entity, array(
            'action' => $this->generateUrl('teacher_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new teacher entity.
     *
     */
    public function newAction()
    {
        $entity = new teacher();
        $form   = $this->createCreateForm($entity);

        return $this->render('myBundleictBundle:teacher:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a teacher entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:teacher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find teacher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('myBundleictBundle:teacher:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing teacher entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:teacher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find teacher entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('myBundleictBundle:teacher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a teacher entity.
    *
    * @param teacher $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(teacher $entity)
    {
        $form = $this->createForm(new teacherType(), $entity, array(
            'action' => $this->generateUrl('teacher_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing teacher entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:teacher')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find teacher entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('teacher_edit', array('id' => $id)));
        }

        return $this->render('myBundleictBundle:teacher:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Count popular an existing teacher entity.
     *
     */
    public function countAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('myBundleictBundle:teacher')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find teacher entity.');
    	}
    	$entity->setPopular(($entity->getPopular())+1);
    	$em->flush();
    	$query = $em->createQuery(
    			'SELECT c FROM myBundleictBundle:teacher c ORDER BY c.popular DESC'
    	);
    
    	$entities = $query->getResult();
    	return $this->render('myBundleictBundle:Default:teacher_skill.html.twig', array(
    			'entities' => $entities,
    	));
    }    
    /**
     * Deletes a teacher entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('myBundleictBundle:teacher')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find teacher entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('teacher'));
    }

    /**
     * Creates a form to delete a teacher entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('teacher_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
