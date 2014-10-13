<?php
namespace myBundle\ictBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;

class ContentController extends Controller
{
	public function helloAction()
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
		
		
		
		//return $this->render('myBundleictBundle:Default:index.html.twig');
	}
}