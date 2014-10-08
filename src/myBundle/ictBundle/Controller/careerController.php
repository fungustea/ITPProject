<?php

namespace myBundle\ictBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use myBundle\ictBundle\Entity\career;
use myBundle\ictBundle\Form\careerType;
/**
 * career controller.
 *
 */
class careerController extends Controller
{

// 	public function checkurl($url)
// 	{
// // 	    $url = 'http://www.example.com';
//     	$handle = @fopen($url,'r');
//     	if($handle !== false){
//     		echo 'Exists';
//     	}
//     	else{
//     		echo "Doesn't";
//     	}
// 	}
// 	public function checkLink($link)
// 	{
// 		echo $link;
// 		flush();
// 		$fp = @fopen($link, "r");
// 		@fclose($fp);
// 		if (!$fp)
// 			{         return false;     }
// 		else
// 			{         return true;     }
// 	}
// 	if ($result = checkLink("http://www.domain.com")){echo "Link works";} else {echo"Link doesn't work;";}
/**
 * Lists all career entities.
 *
 */
	public function mainAction()
	{
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
				'SELECT c FROM myBundleictBundle:career c ORDER BY c.popular DESC'
		);
		
		$entities = $query->getResult();
// 		$entities = $em->getRepository('myBundleictBundle:career')->findAll();
// 		$dm = $this->get('doctrine.odm.mongodb.document_manager');
// 		$animalLoggableCursors = $dm->getRepository('MyBundle:Animal')->findBy(array("prop" => "1"));
		
		$new_entities = array();
// 		while ($entity = $entities->fetch()) {
// 			if ($result = checkLink($entity->getUrl()))
// 			{echo "Link works";} 
// 			else 
// 			{echo"Link doesn't work;";}
// // 			if ($animal->getSomeProperty() == $someValue)
// // 				array_push($animals, $animal);
// 		}	
		foreach($entities as $entity)
		{
// 			echo "test";
// 			echo "----->";
// 			echo $entity->getURL();
// // 			echo count($article->getComments());
// 			echo "<-----";
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
// 		 if (checkLink($entity->getURL()))
// 			{echo "Link works";} 
//  			else 
//  			{echo"Link doesn't work;";}
		}
		return $this->render('myBundleictBundle:Default:parent_career.html.twig', array(
				'entities' => $new_entities,
		));
	}
    /**
     * Lists all career entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('myBundleictBundle:career')->findAll();

        return $this->render('myBundleictBundle:career:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new career entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new career();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('career_show', array('id' => $entity->getId())));
        }

        return $this->render('myBundleictBundle:career:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a career entity.
     *
     * @param career $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(career $entity)
    {
        $form = $this->createForm(new careerType(), $entity, array(
            'action' => $this->generateUrl('career_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new career entity.
     *
     */
    public function newAction()
    {
        $entity = new career();
        $form   = $this->createCreateForm($entity);

        return $this->render('myBundleictBundle:career:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a career entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:career')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find career entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('myBundleictBundle:career:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing career entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:career')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find career entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('myBundleictBundle:career:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a career entity.
    *
    * @param career $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(career $entity)
    {
        $form = $this->createForm(new careerType(), $entity, array(
            'action' => $this->generateUrl('career_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing career entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('myBundleictBundle:career')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find career entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('career_edit', array('id' => $id)));
        }

        return $this->render('myBundleictBundle:career:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Count popular an existing career entity.
     *
     */
    public function countAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('myBundleictBundle:career')->find($id);
    
    	if (!$entity) {
    		throw $this->createNotFoundException('Unable to find career entity.');
    	}
    	$entity->setPopular(($entity->getPopular())+1);
    	$em->flush();
    	$query = $em->createQuery(
    	    	'SELECT c FROM myBundleictBundle:career c ORDER BY c.popular DESC'
    	);
    	    	
    	$entities = $query->getResult();    	    		
		return $this->render('myBundleictBundle:Default:parent_career.html.twig', array(
				'entities' => $entities,
		));
    }
    /**
     * Deletes a career entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('myBundleictBundle:career')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find career entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('career'));
    }

    /**
     * Creates a form to delete a career entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('career_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
