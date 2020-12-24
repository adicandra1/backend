<?php namespace App\Repository;

use App\Entities\Vacancy;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class VacancyRepository extends EntityRepository
{
    private EntityManager $em;

    /**
     * @return Vacancy[]
     */
    public function all(int $limit) {
        //$this->findAll();
        return array(
            Vacancy::withMockData(),
            Vacancy::withMockData(),
            Vacancy::withMockData(),
            Vacancy::withMockData()
        );
    }

    public function get(string $vacancyId) : Vacancy {
        return Vacancy::withMockData();
    }

    public function add(Vacancy $vacancy) {
        $this->em->persist($vacancy);
        $this->em->flush();
    }

    public function delete(string $id) {}

    
}