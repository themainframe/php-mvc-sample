<?php
/**
 * Person Class
 * Provides access to the "Person" database table.
 *
 * @author Damien Walsh <me@damow.net>
 */
class Person extends AbstractModel
{
    /**
     *  Three columns,
     *
     *      - The ID
     *      - The person name
     *      - The person's favourite colour.
     */
    public static $data = array(
        array(
            'id' => 1,
            'name' => 'Johnny Greensmith',
            'fav_colour' => 'Green'
        ),

        array(
            'id' => 2,
            'name' => 'Mary Blueton',
            'fav_colour' => 'Blue'
        )
    );
}
