<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Fabric;
use App\Entity\Service;
use App\Entity\Status;
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
            ['name' => 'chemise', 'imgUrl' => 'chemise.webp', 'coeff' => 1.2],
            ['name' => 'blouse', 'imgUrl' => 'blouse.webp', 'coeff' => 1.1],
            ['name' => 'pull', 'imgUrl' => 'pull.webp', 'coeff' => 1.2],
            ['name' => 'tee-shirt', 'imgUrl' => 'teeshirt.webp', 'coeff' => 1.0],
        ];
        foreach ($allHauts as $haut) {
            $article = new Article();
            $article->setArticleName($haut['name']);
            $article->setIdCategory($hauts);
            $article->setImgUrl($haut['imgUrl']);
            $article->setCoeff($haut['coeff']);
            $manager->persist($article);
        }

        $allBas = [
            ['name' => 'pantalon', 'imgUrl' => 'pantalon.webp', 'coeff' => 1.4],
            ['name' => 'jupe_courte', 'imgUrl' => 'jupecourte.webp', 'coeff' => 1.2],
            ['name' => 'short', 'imgUrl' => 'short.webp', 'coeff' => 1.3],
            ['name' => 'jupe_longue', 'imgUrl' => 'jupelongue.webp', 'coeff' => 1.3],
        ];
        foreach ($allBas as $basName) {
            $article = new Article();
            $article->setArticleName($basName['name']);
            $article->setIdCategory($bas);
            $article->setImgUrl($basName['imgUrl']);
            $article->setCoeff($basName['coeff']);
            $manager->persist($article);
        }

        $allRobes = [
            ['name' => 'robe_longue', 'imgUrl' => 'robelongue.webp', 'coeff' => 1.6],
            ['name' => 'robe_courte', 'imgUrl' => 'robecourte.webp', 'coeff' => 1.3],
            ['name' => 'combinaison', 'imgUrl' => 'combinaison.webp', 'coeff' => 1.6],
            ['name' => 'combishort', 'imgUrl' => 'combishort.webp', 'coeff' => 1.4],
        ];
        foreach ($allRobes as $robe) {
            $article = new Article();
            $article->setArticleName($robe['name']);
            $article->setIdCategory($robes);
            $article->setImgUrl($robe['imgUrl']);
            $article->setCoeff($robe['coeff']);
            $manager->persist($article);
        }

        $allAccessories = [
            ['name' => 'echarpe', 'imgUrl' => 'echarpe.webp', 'coeff' => 1.8],
            ['name' => 'twillie', 'imgUrl' => 'twillie.webp', 'coeff' => 1.9],
            ['name' => 'foulard', 'imgUrl' => 'foulard.webp', 'coeff' => 1.6],
        ];
        foreach ($allAccessories as $accessory) {
            $article = new Article();
            $article->setArticleName($accessory['name']);
            $article->setIdCategory($accessoires);
            $article->setImgUrl($accessory['imgUrl']);
            $article->setCoeff($accessory['coeff']);
            $manager->persist($article);
        }

        $allManteau = [
            ['name' => 'manteau_court', 'imgUrl' => 'manteaucourt.webp', 'coeff' => 2.3],
            ['name' => 'manteau_long', 'imgUrl' => 'manteaulong.webp', 'coeff' => 2.5],
            ['name' => 'veste_longue', 'imgUrl' => 'vestelongue.webp', 'coeff' => 1.9],
            ['name' => 'veste_courte', 'imgUrl' => 'vestecourte.webp', 'coeff' => 1.8],
        ];
        foreach ($allManteau as $manteauName) {
            $article = new Article();
            $article->setArticleName($manteauName['name']);
            $article->setIdCategory($manteau);
            $article->setImgUrl($manteauName['imgUrl']);
            $article->setCoeff($manteauName['coeff']);
            $manager->persist($article);
        }


        // FABRIC FIXTURES


        $allFabrics = [
            ['name' => 'coton', 'coeff' => 1.0],
            ['name' => 'laine', 'coeff' => 2],
            ['name' => 'synthétique', 'coeff' => 0.9],
            ['name' => 'soie', 'coeff' => 2],
            ['name' => 'cachemire', 'coeff' => 2,4],
            ['name' => 'lin', 'coeff' => 1.8],
            ['name' => 'cuir', 'coeff' => 2.4],
            ['name' => 'velours', 'coeff' => 1.6],
        ];
        foreach ($allFabrics as $fabric) {
            $fabricEntity = new Fabric();
            $fabricEntity->setFabricName($fabric['name']);
            $fabricEntity->setCoeff($fabric['coeff']);
            $manager->persist($fabricEntity);
        }


        // SERVICES FIXTURES

        $allServices = [
            [ 'name' => 'nettoyage', 'price' => 5],
            [ 'name' => 'repassage', 'price' => 3]
        ];
        foreach ($allServices as $service) {
            $serviceEntity = new Service();
            $serviceEntity->setServiceName($service['name']);
            $serviceEntity->setPrice($service['price']);
            $manager->persist($serviceEntity);
        }

        // STATUS FIXTURES

        $allStatus = ['en cours','terminé'];

        foreach ($allStatus as $status) {
            $statusEntity = new Status();
            $statusEntity->setStatusName($status['name']);
            $manager->persist($statusEntity);
        }
    

        $manager->flush();
    }
}
