<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Fullfidesio;
use App\Entity\Correspondance;
use App\Entity\ModeTransport;
use App\Entity\Station;
use App\Entity\Terminus;

class LandingController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('fidesio/home/index.html.twig', []);
    }
    /**
     * @Route("/questions/4", methods="GET|POST", name="question_four")
     */
    public function questionFour(Request $request)
    {
        $em = $this->get('doctrine')->getManager();
        $correspondances = $em->getRepository(Correspondance::class)
            ->findAll();
        return $this->render(
            'fidesio/question/question4.html.twig',
            [
                'correspondances' => $correspondances,
            ]
        );
    }

    /**
     * @Route("/questions/4/ligne/{ligne}", methods="GET|POST", name="question_four_filter")
     */
    public function questionFourv2(Request $request, $ligne)
    {
        $em = $this->get('doctrine')->getManager();
        $correspondances = $em->getRepository(Correspondance::class)
            ->findAll();

        return $this->render(
            'fidesio/question/question4.html.twig',
            [
                'correspondances' => $correspondances,
                'ligne' => $ligne
            ]
        );
    }
}
