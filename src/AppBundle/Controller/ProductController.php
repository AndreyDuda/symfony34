<?php
/**
 * Created by PhpStorm.
 * User: andreew
 * Date: 21.10.18
 * Time: 0:05
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     */
    public function indexAction()
    {
        $products = [];

        for ($i=0; $i<=10; $i++) {
            $products[] = rand(1, 100);
        }

        $data = [
            'products' => $products
        ];

        return $this->render('@App/product/index.html.twig', $data);
    }

    /**
     * @Route("/product/{id}", name="product_item", requirements={"id": "[0-9]+"})
     */
    public function showAction(Request $request)
    {
        die($request->get('id'));
    }

}