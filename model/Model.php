<?php
abstract class Model
{
    public static function findByColumn($column, $value)
    {
        // Find the person
        foreach (static::$data as $row) {
            if ($row[$column] == $value) {
                $instance = new static;
                foreach ($row as $key => $value) {
                    $instance->{$key} = $value;
                }
                return $instance;
            }
        }
        return false;
    }

    public function persist()
    {
        foreach (static::$data as & $row) {
            if ($row['id'] == $this->id) {
                foreach ($this as $key => $value) {
                    $row[$key] = $value;
                }
            }
        }
    }
}
