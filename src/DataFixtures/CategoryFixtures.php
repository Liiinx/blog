<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = ['php', 'java', 'javascript', 'ruby', 'python', 'devOps'];

    public function load(ObjectManager $manager)
    {
        /* $product = new Product();
        // $manager->persist($product);
        $category = new Category();
        $category->setName('php');
        $manager->persist($category);
        $manager->flush();
        */
        foreach (self::CATEGORIES as $key => $categoryName)
        {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('categorie_' . $key, $category);
        }
        $manager->flush();
    }

}
