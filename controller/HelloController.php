<?php
/**
 * HelloController
 * Says hello to a person.
 *
 * @author Damien Walsh <me@damow.net>
 */
class HelloController
{
    /**
     * Say hello to a person.
     * $params will be an array of parameters passed by the Front Controller.
     *
     * For this example, the /hello/<ID> route will pass:
     *
     *      $params[0]  -  The whole route, E.g. /hello/1
     *      $params[1]  -  Just the ID, E.g. 1
     *
     * @param array $params The parameters from the URL.
     */
    public function helloAction($params)
    {
        // Find the requested person in the database
        $person = Person::findByColumn('id', $params[1]);

        // Render the helloView view
        include 'view/helloView.php';
    }
}

