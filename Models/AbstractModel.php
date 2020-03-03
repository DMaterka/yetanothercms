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
            if (!empty($result)) {
                $model->{$name} = $result;
            }
        }
        return $model;
    }

    /**
     * TODO check against database fields
     * @throws \ReflectionException
     */
    public function save()
    {
        $objectValues = array_filter($this->toArray());
        $queryElements['first_part'] = 'INSERT INTO';
        $queryElements['table'] = self::getTableName();
//        $queryElements['values'] = 'VALUES ('.  str_repeat('?,', count($properties)).')';
        $queryElements['columns'] = '(title,intro,content)';
        $queryElements['values'] = 'VALUES (?,?,?)';
        $sql = implode(' ', $queryElements);
        $stmt = DB::getConnection()->prepare($sql);
        $stmt->execute(array_values($objectValues));
    }

    /**
     * @param int $id
     * @throws \ReflectionException
     */
    public static function delete(int $id)
    {
        $queryElements['first_part'] = 'DELETE FROM';
        $queryElements['table'] = self::getTableName();
        $queryElements['conditions'] = 'WHERE id=?';
        $sql = implode(' ', $queryElements);
        $stmt = DB::getConnection()->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * @throws \ReflectionException
     */
    public function update(int $id)
    {
        $objectValues = array_filter($this->toArray());
        $queryElements['first_part'] = 'UPDATE';
        $queryElements['table'] = self::getTableName();
        $updateStr = '';
        foreach ($objectValues as $key => $objectValue) {
            $updateStr .= $key . '=:' . $key . ', ';
        }
        $queryElements['columns'] = 'SET '. rtrim($updateStr, ', ');
        $queryElements['conditions'] = 'WHERE id=:id';
        $sql = implode(' ', $queryElements);
        $stmt = DB::getConnection()->prepare($sql);
        $stmt->execute(array_merge($objectValues, ['id' => $id]));
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
