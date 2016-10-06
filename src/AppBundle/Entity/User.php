<?php
/**
 * Created by PhpStorm.
 * User: murilo
 * Date: 06/10/16
 * Time: 00:56
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")d
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}