<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Form\WishType;
use App\Repository\WishRepository;
use App\services\Censurator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/wish",name="wish_")
 */
class WishController extends AbstractController
{
    /**
     * @Route("",name="list")
     */
    public function list(WishRepository $wishRepository):Response
    {
        $wishs = $wishRepository->findBy([],["dateCreated"=>'DESC']);
        return $this->render("wish/list.html.twig",[
            "title"=>"Liste",
            "wishs"=>$wishs
        ]);
    }

    /**
     * @Route("detail/{id}",name="detail",requirements={"id"="\d+"}))
     */
    public function detail(int $id,WishRepository $wishRepository):Response
    {
        $wish = $wishRepository->findOneBy(["id"=>$id]);
        return $this->render("wish/detail.html.twig",[
            "title"=>"Détail",
            "wish"=>$wish
        ]);
    }

    /**
     *  @Route("/create", name="create")
     */
    public function create(Request $request, EntityManagerInterface $entityManager,Censurator $censurator): Response
    {
        $wish = new Wish();
        $wish->setDateCreated(new \DateTime());
        $wish->setIsPublished(true);
        $formWish = $this->createForm(WishType::class,$wish);

        $formWish->handleRequest($request);
        if($formWish->isSubmitted() && $formWish->isValid()){
            $wish->setDescription($censurator->purify($wish->getDescription()));
            $entityManager->persist($wish);
            $entityManager->flush();

            $this->addFlash('success','L\'idée à bien été sauvegardée !');
            return $this->redirectToRoute('wish_detail',['id'=>$wish->getId()]);
        }

        return $this->render('wish/form.html.twig', [
            "title"=>"Create",
            'formWish' =>$formWish->createView()
        ]);
    }
}
