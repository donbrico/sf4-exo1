<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;

/**
 * Class ArticleFixtures
 * @package App\DataFixtures
 */
class ArticleFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create('fr_FR');

        //Créer 3 catégories fakées
        $count = 3;
        for($i=1;$i<=$count;$i++){
            $category = new Category();
            $category->setTitle($faker->sentence)
                     ->setDescription($faker->paragraph());

            $manager->persist($category);

            //Créer entre 4 et 6 articles
            for($j = 1, $jMax = mt_rand(4, 6); $j <= $jMax; $j++){
                $article = new Article();

                $content = '<p>' . implode($faker->paragraphs(5), '</p><p>') . '</p>';

                $article->setTitle($faker->sentence())
                    ->setContent($content)
                    ->setImage($faker->imageUrl())
                    ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                    ->setCategory($category);

                $manager->persist(($article));

                // On donne des commentaires à l'article
                $content = '<p>' . implode($faker->paragraphs(2), '</p><p>') . '</p>';

                $days = (new \DateTime())->diff($article->getCreatedAt())->days;

                for($k = 0, $kMax = mt_rand(4, 10); $k <= $kMax; $k++){
                    $comment = new Comment();
                    $comment->setAuthor($faker->name)
                            ->setContent($content)
                            ->setCreatedAt($faker->dateTimeBetween('-' . $days . ' days'))
                            ->setArticle($article);

                    $manager->persist($comment);
                }
            }
        }

        $manager->flush();
    }
}
