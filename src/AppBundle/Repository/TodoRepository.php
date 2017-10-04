<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;

/**
 * TodoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TodoRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllUserTodo(User $user)
    {
        return $this->createQueryBuilder('todo')
            ->andWhere('todo.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByUserAndTodo(User $user, $todoID)
    {
        return $this->createQueryBuilder('todo')
            ->andWhere('todo.user = :user', 'todo.id = :id')
            ->setParameter('user', $user)
            ->setParameter('id', $todoID)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
