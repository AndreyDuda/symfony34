<?php
/**
 * Created by PhpStorm.
 * User: andreew
 * Date: 21.10.18
 * Time: 0:05
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()
                         ->getRepository('AppBundle:Product')
                         ->findActive();

        $data = [
            'products' => $products
        ];
        return $data;
    }

    /**
     * @Route("/product/{id}", name="product_item", requirements={"id": "[0-9]+"})
     * @Template()
     * @param Product $product
     * @return array
     */
    public function showAction(Product $product)
    {

        $data = [
            'product' => $product
        ];
        return $data;
    }

    /**
     * @Route("/category/{id}", name="product_by_category")
     * @param Category $category
     * @Template()
     */
    public function listCategoryAction(Category $category)
    {
        $products = $this->getDoctrine()
                         ->getRepository('AppBundle:Product')
                         ->findByCategory($category);
        $data = [
            'products' => $products
        ];

        return $data;
    }

}