<?php


namespace Models;

use Database\DB;

/**
 * Class AbstractModel
 * @package Models
 */
abstract class AbstractModel
{
    /**
     * @return array
     * @throws \ReflectionException
     */
    public function toArray(): array
    {
        $reflectionProperties = $this->getModelProperties();
        $returnedArray = [];
        foreach ($reflectionProperties as $reflectionProperty) {
            $reflectionProperty->setAccessible(true);
            $returnedArray[$reflectionProperty->getName()] = $reflectionProperty->getValue($this);
        }
        return $returnedArray;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \ReflectionException
     */
    public static function fetch(?int $id = null)
    {
        $queryElements['first_part'] = 'SELECT * FROM';
        $queryElements['table'] = self::getTableName();

        if (!empty($id)) {
            $queryElements['conditions'] = 'WHERE id=?';
        }

        //prevent ddos
        $queryElements['limit'] = 'LIMIT 100';

        $sql = implode(' ', $queryElements);

        $stmt = DB::getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $className = get_called_class();
        $model = new $className();
        if (!empty($id)) {
            $results = $results[0];
        }
        foreach ($results as $name => $result) {
            $model->{$name} = $result;
        }

        return $model;
    }

    /**
     * TODO
     * @throws \ReflectionException
     */
    public function save()
    {
        $properties = $this->getModelProperties();
        $makeQuery['first_part'] = 'INSERT INTO';
        $makeQuery['table'] = '';
    }

    /**
     * @return \ReflectionProperty[]
     * @throws \ReflectionException
     */
    private function getModelProperties(): array
    {
         return (new \ReflectionClass(get_called_class()))->getProperties();
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    private function getTableName(): string
    {
        return (new \ReflectionClass(get_called_class()))->getConstant('TABLE');
    }

    /**
     * @return array
     */
    private function getModelInterface()
    {
        return class_implements(get_called_class());
    }

}