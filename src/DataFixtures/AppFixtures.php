<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $chemise = new Article();
        // $chemise->setArticleName('Chemise');
        // $chemise->setCoeff(0.5);                
        // $manager->persist($chemise);

        $hauts = new Category();
        $hauts->setCategoryName('Hauts');
        $manager->persist($hauts);

        $bas = new Category();
        $bas->setCategoryName('Bas');
        $manager->persist($bas);

        $robes = new Category();
        $robes->setCategoryName('Robes');
        $manager->persist($robes);

        $accessoires = new Category();
        $accessoires->setCategoryName('Accessoires');
        $manager->persist($accessoires);

        $manager->flush();
    }
}
