<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 05.05.18
 * Time: 11:42
 */

namespace AppBundle\CarQuery;


interface CarQueryApiInterface
{
    /**
     * @param $id - CarQuery Api Model id
     * @return mixed
     */
    public function getModel($id);

    /**
     * @param array $params
     * @return mixed
     */
    public function getTrims(array $params = []);
}