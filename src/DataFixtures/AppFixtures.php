<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Fabric;
use App\Entity\Gender;
use App\Entity\Service;
use App\Entity\Status;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }
    public function load(ObjectManager $manager): void
    {

        // GENDER FIXTURES

        $allGender = ['Monsieur', 'Madame', 'Autre'];

        foreach ($allGender as $gender) {
            $genderEntity = new Gender();
            $genderEntity->setGenderName($gender);
            $manager->persist($genderEntity);
        }

        $user = new User();
        $user
            ->setEmail('user@test.com')
            ->setPassword('test')
            ->setName('amelie');


        $manager->persist($user);

        $adminUser = new User();
        $adminUser
            ->setEmail('admin@sparkle.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('admin')
            ->setName('admin');


        $manager->persist($adminUser);



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
            ['name' => 'Chemise', 'imgUrl' => 'chemise.webp', 'coeff' => 1.2],
            ['name' => 'Blouse', 'imgUrl' => 'blouse.webp', 'coeff' => 1.1],
            ['name' => 'Pull', 'imgUrl' => 'pull.webp', 'coeff' => 1.2],
            ['name' => 'Tee-shirt', 'imgUrl' => 'teeshirt.webp', 'coeff' => 1.0],
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
            ['name' => 'Pantalon', 'imgUrl' => 'pantalon.webp', 'coeff' => 1.4],
            ['name' => 'Jupe courte', 'imgUrl' => 'jupecourte.webp', 'coeff' => 1.2],
            ['name' => 'Short', 'imgUrl' => 'short.webp', 'coeff' => 1.3],
            ['name' => 'Jupe longue', 'imgUrl' => 'jupelongue.webp', 'coeff' => 1.3],
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
            ['name' => 'Robe longue', 'imgUrl' => 'robelongue.webp', 'coeff' => 1.6],
            ['name' => 'Robe courte', 'imgUrl' => 'robecourte.webp', 'coeff' => 1.3],
            ['name' => 'Combinaison', 'imgUrl' => 'combinaison.webp', 'coeff' => 1.6],
            ['name' => 'Combishort', 'imgUrl' => 'combishort.webp', 'coeff' => 1.4],
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
            ['name' => 'Echarpe', 'imgUrl' => 'echarpe.webp', 'coeff' => 1.8],
            ['name' => 'Twillie', 'imgUrl' => 'twillie.webp', 'coeff' => 1.9],
            ['name' => 'Foulard', 'imgUrl' => 'foulard.webp', 'coeff' => 1.6],
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
            ['name' => 'Manteau court', 'imgUrl' => 'manteaucourt.webp', 'coeff' => 2.3],
            ['name' => 'Manteau long', 'imgUrl' => 'manteaulong.webp', 'coeff' => 2.5],
            ['name' => 'Veste longue', 'imgUrl' => 'vestelongue.webp', 'coeff' => 1.9],
            ['name' => 'Veste courte', 'imgUrl' => 'vestecourte.webp', 'coeff' => 1.8],
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
            ['name' => 'Coton', 'coeff' => 1.0],
            ['name' => 'Laine', 'coeff' => 2],
            ['name' => 'Synthétique', 'coeff' => 0.9],
            ['name' => 'Soie', 'coeff' => 2],
            ['name' => 'Cachemire', 'coeff' => 2, 4],
            ['name' => 'Lin', 'coeff' => 1.8],
            ['name' => 'Cuir', 'coeff' => 2.4],
            ['name' => 'Velours', 'coeff' => 1.6],
        ];
        foreach ($allFabrics as $fabric) {
            $fabricEntity = new Fabric();
            $fabricEntity->setFabricName($fabric['name']);
            $fabricEntity->setCoeff($fabric['coeff']);
            $manager->persist($fabricEntity);
        }


        // SERVICES FIXTURES

        $allServices = [
            ['name' => 'Nettoyage', 'price' => 5],
            ['name' => 'Repassage', 'price' => 3]
        ];
        foreach ($allServices as $service) {
            $serviceEntity = new Service();
            $serviceEntity->setServiceName($service['name']);
            $serviceEntity->setPrice($service['price']);
            $manager->persist($serviceEntity);
        }

        // STATUS FIXTURES

        $allStatus = ['en cours', 'terminée', 'annulée'];

        foreach ($allStatus as $status) {
            $statusEntity = new Status();
            $statusEntity->setStatusName($status);
            $manager->persist($statusEntity);
        }




        $manager->flush();
    }
}
