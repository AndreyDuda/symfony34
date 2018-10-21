<?php
/**
 * Created by PhpStorm.
 * User: andreew
 * Date: 21.10.18
 * Time: 17:51
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Category;

class CategoryController extends Controller
{
    /**
     * @Route("/categoryes", name="category_list")
     * @Template()
     */
    public function IndexAction()
    {
        $categories = $this->getDoctrine()
                           ->getRepository('AppBundle:Category')
                           ->findBy([], ['id' => 'ASC']);

        return [
            'categories' => $categories
        ];
    }


}