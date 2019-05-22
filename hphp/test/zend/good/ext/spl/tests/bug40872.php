<?php
    class Project {
        public $id;

        function __construct($id) {
            $this->id = $id;
        }
    }

    class ProjectsList extends ArrayIterator {
        public function add(Project $item) {
            $this->offsetSet($item->id, $item);
        }
    }

    $projects = new ProjectsList();
    $projects->add(new Project('1'));
    $projects->add(new Project(2));

    var_dump($projects->offsetExists(1));
    var_dump($projects->offsetExists('2'));
<<__EntryPoint>> function main() {
echo "===DONE===\n";
}
