<?php
/**
 * AbstractModel Class
 * A generic representation of a database table.
 *
 * For now, the database tables used are stored in the model
 * classes themselves. This could be modified to access a
 * "real" database, for example MySQL or SQLite.
 *
 * Model classes (E.g. Person) inherit this class so that
 * instances can be pulled out from the database.
 *
 * @author Damien Walsh <me@damow.net>
 */
abstract class AbstractModel
{
    /**
     * This method looks through the associated database table
     * for a row that has a certain value in a certain column.
     *
     * For example, a call to:
     *
     *      Person::findByColumn('name', 'Johnny Greensmith');
     *
     * ...would return a new instance of Person, hydrated with
     * Johnny Greensmith's details.
     *
     * @param string $column The column to search in.
     * @param mixed $value The value to search for.
     * @return bool|object
     */
    public static function findByColumn($column, $value)
    {
        // Find the row in the database
        foreach (static::$data as $row) {

            // If this is the row...
            if ($row[$column] == $value) {

                // Create a new instance of the actual class
                $instance = new static;

                // Hydrate the instance with the row contents
                foreach ($row as $key => $value) {
                    $instance->{$key} = $value;
                }

                // Return the new instance
                return $instance;
            }
        }
        return false;
    }

    /**
     * This method persists the current instance to the
     * database table it came from.
     *
     * For example, you could modify Johnny Greensmith's favourite
     * colour with the following code:
     *
     *      $jonny = Person::findByColumn('id', 1);
     *      $johnny->fav_colour = 'Orange';
     *      $johnny->persist();
     *
     * This would update the data stored in the Person class.
     * Normally, this would generate an SQL query to persist
     * a row back to the database table it came from.
     */
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
