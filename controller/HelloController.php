<?php
class HelloController {
    public function helloAction($params)
    {
        $person = Person::findByColumn('id', $params[1]);
        include 'view/helloView.php';
    }
}

