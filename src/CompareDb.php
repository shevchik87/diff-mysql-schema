<?php

class CompareDb
{
    public $main;
    public $child;

    public function __construct($sourceDb, $destionationDb)
    {
        $this->main = $sourceDb;
        $this->child = $destionationDb;
        $diff_table = array_diff($sourceDb->getTables(), $destionationDb->getTables());
        var_dump($diff_table);
    }

    public function compare()
    {
        foreach($this->main->getTables() as $table) {
            $schema_main = $this->main->getSchemaTable($table);
            $schema_child = $this->child->getSchemaTable($table);

            echo $table.PHP_EOL;
            var_dump(array_diff($schema_main,$schema_child));
        }
    }

}