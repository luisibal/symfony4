<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Author;
use App\Entity\Pdf;
use App\Entity\Video;


class InheritanceEntitiesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 2; $i++) {
            $author = new Author;
            $author->setName('author name' . $i);
            $manager->persist($author);
        }

        for ($j = 1; $j <= 3; $j++) {
            $pdf = new Pdf;
            $pdf->setFilename('pdf name of user' . $j); // common elements of File
            $pdf->setDescription('pdf description of user' . $i); // common elements of File
            $pdf->setSize(5454); // common elements of File
            $pdf->setAuthor($author); // common elements of File
            $pdf->setOrientation('portrait'); //especific properties of PDF
            $pdf->setPagesNumber(123); //especific properties of PDF
            $manager->persist($pdf);
        }

        for ($j = 1; $j <= 10; $j++) {
            $video = new Video;
            $video->setFilename('pdf name of user' . $j); // common elements of File
            $video->setDescription('pdf description of user' . $i); // common elements of File
            $video->setSize(5454); // common elements of File
            $video->setAuthor($author); // common elements of File
            $video->setFormat('mpeg-2'); //especific properties of Vide
            $video->setDuration(123); //especific properties of vide
            $manager->persist($video);
        }

        $manager->flush();
    }
}
