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


            $result = array_diff($schema_main,$schema_child);

            if (!empty($result)) {
                echo 'Table - '. $table.PHP_EOL;
                foreach ($result as $item) {
                    echo 'column - '.$item.PHP_EOL;
                }
            }
        }
    }

}