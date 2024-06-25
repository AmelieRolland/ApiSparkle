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


        $allHauts = [
            'chemise' => 'chemise.webp',
            'blouse' => 'blouse.webp',
            'pull' => 'pull.webp',
            'tee-shirt' => 'teeshirt.webp'
        ];
        foreach ($allHauts as $hautName => $imgUrl) {
            $article = new Article();
            $article->setArticleName($hautName);
            $article->setIdCategory($hauts);
            $article->setImgUrl($imgUrl);
            $manager->persist($article);
        }

        $allBas = [
            'pantalon' => 'pantalon.webp',
            'jupe_courte' => 'jupecourte.webp',
            'short' => 'short.webp',
            'jupe_longue' => 'jupelongue.webp'
        ];
        foreach ($allBas as $basName => $imgUrl) {
            $article = new Article();
            $article->setArticleName($basName);
            $article->setIdCategory($bas);
            $article->setImgUrl($imgUrl);
            $manager->persist($article);
        }

        $allRobes = [
            'robe_longue' => 'robelongue.webp',
            'robe_courte' => 'robecourte.webp',
            'combinaison' => 'combinaison.webp',
            'combishort' => 'combishort.webp'
        ];
        foreach ($allRobes as $robeName => $imgUrl) {
            $article = new Article();
            $article->setArticleName($robeName);
            $article->setIdCategory($robes);
            $article->setImgUrl($imgUrl);
            $manager->persist($article);
        }

        $allAccessories = [
            'echarpe' => 'echarpe.webp',
            'twillie' => 'twillie.webp',
            'foulard' => 'foulard.webp'
        ];
        foreach ($allAccessories as $accessoryName => $imgUrl) {
            $article = new Article();
            $article->setArticleName($accessoryName);
            $article->setIdCategory($accessoires);
            $article->setImgUrl($imgUrl);
            $manager->persist($article);
        }

        $allManteau = [
            'manteau_court' => 'manteaucourt.webp',
            'manteau_long' => 'manteaulong.webp',
            'veste_longue' => 'vestelongue.webp',
            'veste_courte' => 'vestecourte.webp'
        ];
        foreach ($allManteau as $manteauName => $imgUrl) {
            $article = new Article();
            $article->setArticleName($manteauName);
            $article->setIdCategory($manteau);
            $article->setImgUrl($imgUrl);
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
