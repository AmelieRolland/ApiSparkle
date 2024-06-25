<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Fabric;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // CATEGORIES FIXTURES

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

        $manteau = new Category();
        $manteau->setCategoryName('Manteau');
        $manager->persist($manteau);


        // ARTICLES FIXTURES


        $allHauts = ['chemise', 'blouse', 'pull', 'gilet', 'tee-shirt'];
        foreach ($allHauts as $hautName) {
            $article = new Article();
            $article->setArticleName($hautName);
            $article->setIdCategory($hauts);
            $manager->persist($article);
        }

        $allBas = ['pantalon', 'jupe_courte', 'short', 'jupe_longue'];
        foreach ($allBas as $basName) {
            $article = new Article();
            $article->setArticleName($basName);
            $article->setIdCategory($bas);
            $manager->persist($article);
        }

        $allRobes = ['robe_longue', 'robe_courte', 'combinaison', 'combishort'];
        foreach ($allRobes as $robeName) {
            $article = new Article();
            $article->setArticleName($robeName);
            $article->setIdCategory($robes);
            $manager->persist($article);
        }

        $allAccessories = ['echarpe', 'twillie', 'foulard'];
        foreach ($allAccessories as $accessoryName) {
            $article = new Article();
            $article->setArticleName($accessoryName);
            $article->setIdCategory($accessoires);
            $manager->persist($article);
        }

        $allManteau = ['manteau_court', 'manteau_long', 'veste_longue', 'veste_courte'];
        foreach ($allManteau as $manteauName) {
            $article = new Article();
            $article->setArticleName($manteauName);
            $article->setIdCategory($manteau);
            $manager->persist($article);
        }


        // FABRIC FIXTURES
        

        $fabrics = ['coton', 'laine', 'synthétique', 'soie', 'cachemire', 'lin', 'cuir', 'velours'];
        foreach ($fabrics as $fabricName) {
            $fabric = new Fabric();
            $fabric->setFabricName($fabricName);
            $manager->persist($fabric);
        }









        $manager->flush();
    }
}
